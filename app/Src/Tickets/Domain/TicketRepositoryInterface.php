<?php
namespace App\Src\Tickets\Domain;

interface TicketRepositoryInterface
{
  public function create(array $data);
  public function findByListId(array $ids);
}
