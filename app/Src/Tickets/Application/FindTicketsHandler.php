<?php
namespace App\Src\Tickets\Application;

use App\Src\Tickets\Domain\TicketRepositoryInterface;

class FindTicketsHandler
{
  private $repository;

  public function __construct(TicketRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(array $ids)
  {
    return $this->repository->findByListId($ids);
  }
}