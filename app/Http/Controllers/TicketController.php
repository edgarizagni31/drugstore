<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($saleId)
    {
        $sale = Sale::findOrFail($saleId);
        $eventData = json_decode($sale->event_data, true);
        $ticketIds = $eventData['tickets'] ?? [];
        $tickets = Ticket::whereIn('id', $ticketIds)->get();

        return view('tickets.index', compact('sale', 'tickets'));
    }
}
