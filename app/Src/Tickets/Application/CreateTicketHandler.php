<?php
namespace App\Src\Tickets\Application;

use App\Src\Tickets\Domain\TicketRepositoryInterface;



class CreateTicketHandler
{
  private $repository;


  public function __construct(TicketRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(array $data)
  {
    return $this->repository->create($data);
  }
}