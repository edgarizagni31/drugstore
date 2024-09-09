<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Sale;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index()
    {
        $latestReport = Report::latest('created_at')->where('event_type', 'ABIERTO')->first();

        if (!$latestReport) {
            return view('cash.index', ['status' => 'CERRADO']);
        }

        $status = $latestReport->event_type;
        $latestReport['event_data'] = json_decode($latestReport['event_data'], true);
        $saleIds = $latestReport['event_data']['sales'] ?? [];
        $sales = Sale::whereIn('id', $saleIds)->get();

        return view('cash.index', ['status' => $status, 'report' => $latestReport, 'sales' => $sales]);
    }
}
