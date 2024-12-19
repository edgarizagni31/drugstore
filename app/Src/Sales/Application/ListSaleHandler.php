<?php

namespace App\Src\Sales\Application;

use App\Src\Sales\Domain\SaleRepositoryInterface;

class ListSaleHandler {
  private $repository;

  public function __construct(SaleRepositoryInterface $repository) 
  {
    $this->repository = $repository;
  }

  public function handle() {
    return $this->repository->list();
  }
}