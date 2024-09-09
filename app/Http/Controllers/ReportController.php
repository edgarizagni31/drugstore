<?php

namespace App\Http\Controllers;

use App\Events\UserAction;
use App\Models\Report;
use App\Models\Sale;
use Auth;
use DB;
use Illuminate\Http\Request;
use Str;

class ReportController extends Controller
{
    public function index()
    {

        $latestReports = Report::all();

        return view('reports.index', ['reports' => $latestReports]);
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'initial_balance' => 'required|numeric|min:0',
        ]);

        $initialBalance = $request->input('initial_balance');
        $aggregateId = (string) Str::uuid();

        $report = Report::create([
            'aggregate_id' => $aggregateId,
            'event_type' => 'ABIERTO',
            'event_data' => json_encode([
                'initial_balance' => $initialBalance,
                'current_balance' => $initialBalance,
                'total_sales' => 0,
                'sales' => []
            ]),
        ]);

        UserAction::dispatch(Auth::user(), 'OPEN_CASH_REGISTER', $report);

        return redirect()->route('cash.index')
            ->with('success', 'Caja abierta exitosamente. Utiliza el ID de la caja para cerrar la caja.');
    }

    public function update(Request $request, $id)
    {
        $report = Report::find($id);

        if (!$report) {
            return redirect()->route('reports.index')
                ->with('error', 'No se encontró el reporte con el ID proporcionado.');
        }

        if ($report->status === 'CERRADO') {
            return redirect()->route('reports.index')
                ->with('info', 'La caja ya está cerrada.');
        }

        $report->update([
            'event_type' => 'CERRADO',
            'event_data' => json_encode([
                'initial_balance' => $report->initial_balance,
                'current_balance' => $report->current_balance,
                'total_sales' => $report->total_sales,
            ]),
        ]);

        UserAction::dispatch(Auth::user(), 'CLOSE_CASH_REGISTER', $report);

        return redirect()->route('cash.index')
            ->with('success', 'Caja cerrada exitosamente.');
    }

    public function showSales($reportId)
    {
        $report = Report::find($reportId);

        if (!$report) {
            return redirect()->back()->with('error', 'Reporte no encontrado.');
        }

        $eventData = json_decode($report->event_data, true);

        $saleIds = $eventData['sales'] ?? [];

        $sales = Sale::whereIn('id', $saleIds)->get();

        return view('reports.sales', compact('sales'));
    }
}
