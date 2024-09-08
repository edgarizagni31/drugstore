<?php

namespace App\Http\Controllers;

use App\Events\UserAction;
use App\Models\Report;
use Auth;
use DB;
use Illuminate\Http\Request;
use Str;

class ReportController extends Controller
{
    public function index()
    {

        $latestReports = Report::select('reports.*')
            ->join(
                DB::raw('(SELECT aggregate_id, MAX(created_at) as latest_created_at FROM reports GROUP BY aggregate_id) as latest'),
                function ($join) {
                    $join->on('reports.aggregate_id', '=', 'latest.aggregate_id')
                        ->on('reports.created_at', '=', 'latest.latest_created_at');
                }
            )
            ->get();
        return view('reports.index', [ 'reports' => $latestReports]);
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
            'event_type' => 'open',
            'event_data' => json_encode([
                'initial_balance' => $initialBalance,
                'current_balance' => $initialBalance,
                'total_sales' => 0
            ]),
        ]);

        UserAction::dispatch(Auth::user(), 'OPEN_CASH_REGISTER', $report);

        return redirect()->route('reports.index')
            ->with('success', 'Caja abierta exitosamente. Utiliza el ID de la caja para cerrar la caja.');
    }

    public function close(Request $request)
    {
        $request->validate([
            'aggregate_id' => 'required|string',
        ]);

        $aggregateId = $request->input('aggregate_id');

        $openReport = Report::where('aggregate_id', $aggregateId)
            ->where('event_type', 'open')
            ->first();

        if (!$openReport) {
            return redirect()->route('reports.closeForm')
                ->with('error', 'ID de caja no encontrado.');
        }

        Report::create([
            'aggregate_id' => $aggregateId,
            'event_type' => 'close',
            'event_data' => json_encode($openReport->event_data),
        ]);

        return redirect()->route('reports.closeForm')
            ->with('success', 'Caja cerrada exitosamente.');
    }
}
