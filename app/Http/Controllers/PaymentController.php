<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($saleId)
    {
        $sale = Sale::findOrFail($saleId);
        $sale['event_data'] = json_decode($sale->event_data, true);

        return view('sales.payment', ['sale' => $sale]);
    }


    public function store(Request $request, string $saleId)
    {
        $sale = Sale::findOrFail($saleId);


        $eventDataSale = json_decode($sale->event_data, true);

        $feedback = 'Pago registrado correctamente';

        if (!is_null($request->input('cash_amount'))) {
            $retrive = (float) $request->input('cash_amount') - (float) $eventDataSale['amount'];
            $feedback .= ' Vuelto a entregar ' . (string) $retrive;
        }


        $sale->update(
            [
                'event_data' => json_encode([
                    'amount' => $eventDataSale['amount'],
                    'quantity' => $eventDataSale['quantity'],
                    'tickets' => $eventDataSale['tickets'],
                    'payment_method' => $request->input('payment_method'),
                    'payment' => is_null($request->input('cash_amount')) ? $eventDataSale['amount'] : $request->input('cash_amount')
                ]),
                'event_type' => 'PAGADA'
            ]
        );

        $report = Report::where('event_type', 'ABIERTO')->latest()->first();

        if ($report) {
            $amount = $eventDataSale['amount'];
            $eventData = json_decode($report->event_data, true);
            $eventData['current_balance'] += $amount;
            $eventData['total_sales'] += $amount;

            array_push($eventData['sales'], $sale->id);

            $report->update([
                'event_data' => json_encode($eventData),
            ]);
        }

        return redirect()->route('sales.index', ['sale' => $sale, 'sales' => Sale::all()])->with('success', $feedback);
    }
}
