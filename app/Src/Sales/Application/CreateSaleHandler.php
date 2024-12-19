<?php

namespace App\Src\Sales\Application;

use App\Src\Sales\Domain\SaleValidator;
use App\Src\Sales\Domain\SaleRepositoryInterface;
use App\Src\Tickets\Infrastructure\TicketRepository;
use App\Src\Users\Application\Events\UserAction;
use DB;
use Str;
use Auth;

class CreateSaleHandler
{
  private $repository;
  private $ticketRepository;
  private $validator;

  public function __construct(SaleRepositoryInterface $repository, SaleValidator $validator, TicketRepository $ticketRepository)
  {
    $this->repository = $repository;
    $this->validator = $validator;
    $this->ticketRepository = $ticketRepository;
  }

  public function handle($data)
  {
    $this->validator->validate($data);

    $aggregateId = (string) Str::uuid();
    $totalAmount = 0;
    $totalQuantity = 0;

    DB::transaction(function () use ($data, $aggregateId, &$totalAmount, &$totalQuantity) {
      $tickets = [];

      foreach ($data["tickets"] as $ticketData) {
        $quantity = $ticketData['quantity'];
        $unitValue = $ticketData['unit_value'];
        $totalValue = $quantity * $unitValue;

        $ticket = $this->ticketRepository->create([
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

      $sale = $this->repository->create([
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
  }
}