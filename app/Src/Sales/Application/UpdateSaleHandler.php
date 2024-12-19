<?php
namespace App\Src\Sales\Application;

use App\Src\Sales\Domain\SaleRepositoryInterface;
use App\Src\Sales\Domain\SaleUpdateValidator;
use App\Src\Tickets\Domain\Ticket;
use App\Src\Tickets\Infrastructure\TicketRepository;

class UpdateSaleHandler
{
  private $repository;
  private $ticketRepository;
  private $validator;

  public function __construct(SaleRepositoryInterface $repository, SaleUpdateValidator $validator, TicketRepository $ticketRepository)
  {
    $this->repository = $repository;
    $this->validator = $validator;
    $this->ticketRepository = $ticketRepository;
  }

  public function handle(int $id, string $status)
  {
    $this->validator->validate($status);

    $sale = $this->repository->findById($id);

    if ($status === 'DESPACHADA') {
        $eventData = json_decode($sale->event_data, true);
        $ticketIds = $eventData['tickets'] ?? [];
        $tickets = $this->ticketRepository->findByListId($ticketIds);

        $tickets->each(function (Ticket $ticket) {
            $product = $ticket->product;
            $product->stock_actual -= 1;

            $product->save();
        });
    }

    return $this->repository->update($id,[
      'event_type' => $status,
    ]);
  }
}