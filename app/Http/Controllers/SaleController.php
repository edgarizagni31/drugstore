<?php

namespace App\Http\Controllers;

use App\Events\UserAction;
use App\Models\Product;
use App\Models\Report;
use App\Models\Sale;
use App\Models\Ticket;
use Auth;
use DB;
use Illuminate\Http\Request;
use Str;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();

        return view('sales.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tickets' => 'required|array',
            'tickets.*.product_id' => 'required|exists:products,id',
            'tickets.*.quantity' => 'required|integer|min:1',
            'tickets.*.unit_value' => 'required|numeric',
        ]);

        $aggregateId = (string) Str::uuid();
        $totalAmount = 0;
        $totalQuantity = 0;

        DB::transaction(function () use ($request, $aggregateId, &$totalAmount, &$totalQuantity) {
            $tickets = [];

            foreach ($request->input('tickets') as $ticketData) {
                $quantity = $ticketData['quantity'];
                $unitValue = $ticketData['unit_value'];
                $totalValue = $quantity * $unitValue;

                $ticket = Ticket::create([
                    'quantity' => $quantity,
                    'unit_value' => $unitValue,
                    'total_value' => $totalValue,
                    'status' => true,
                    'product_id' => $ticketData['product_id'],
                ]);

                $totalAmount += $totalValue;
                $totalQuantity += $quantity;

                array_push($tickets, $ticket->id);
            }

            $sale = Sale::create([
                'aggregate_id' => $aggregateId,
                'event_type' => 'PENDIENTE',
                'event_data' => json_encode([
                    'amount' => $totalAmount,
                    'quantity' => $totalQuantity,
                    'tickets' => $tickets
                ]),
                'created_at' => now()
            ]);


            UserAction::dispatch(Auth::user(), 'SALE_CREATED', $sale);
        });

        return redirect()->route('sales.create')
            ->with('success', 'Venta registrada con éxito.');
    }

    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function updateStatus(Request $request, Sale $sale, $status)
    {
        $validStatuses = ['PENDIENTE', 'PAGADA', 'DESPACHADA'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Estado inválido.');
        }

        if ($status === 'DESPACHADA') {
            $eventData = json_decode($sale->event_data, true);
            $ticketIds = $eventData['tickets'] ?? [];
            $tickets = Ticket::whereIn('id', $ticketIds)->get();

            $tickets->each(function (Ticket $ticket) {
                $product = $ticket->product;
                $product->stock_actual -= 1;

                $product->save();
            });
        }

        $sale->update([
            'event_type' => $status,
        ]);

        return redirect()->route('sales.index')
            ->with('success', 'Estado de venta actualizado.');
    }
}
