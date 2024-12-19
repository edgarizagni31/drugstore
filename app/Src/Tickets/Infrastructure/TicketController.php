<?php
namespace App\Src\Tickets\Infrastructure;

use App\Http\Controllers\Controller;
use App\Src\Sales\Infrastructure\SaleRepository;
use App\Src\Tickets\Infrastructure\TicketRepository;
use App\Src\Tickets\Application\FindTicketsHandler;

class TicketController extends Controller
{
    private $findTicketsHandler;
    private $saleRepository;
    private $repository;

    public function __construct(FindTicketsHandler $findTicketsHandler, SaleRepository $saleRepository, TicketRepository $repository)
    {
        $this->findTicketsHandler = $findTicketsHandler;
        $this->saleRepository = $saleRepository;
        $this->repository = $repository;
    }

    public function index($saleId)
    {
        $sale = $this->saleRepository->findById($saleId);
        $eventData = json_decode($sale->event_data, true);
        $ticketIds = $eventData['tickets'] ?? [];
        $tickets = $this->repository->findByListId($ticketIds);

        return view('Tickets::index', compact('sale', 'tickets'));
    }
}