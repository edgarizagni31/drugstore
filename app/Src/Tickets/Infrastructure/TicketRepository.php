<?php
namespace App\Src\Tickets\Infrastructure;

use App\Src\Tickets\Domain\Ticket;
use App\Src\Tickets\Domain\User;
use App\Src\Tickets\Domain\TicketRepositoryInterface;

class TicketRepository implements TicketRepositoryInterface
{
  public function create(array $data)
  {
    return Ticket::create($data);
  }

  public function findByListId(array $ids) {
    return Ticket::whereIn('id', $ids)->get();
  }
}
