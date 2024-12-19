<?php

namespace App\Src\Products\Application;

use App\Src\Products\Domain\ProductRepositoryInterface;

class ListProductsHandler
{
  private $repository;

  public function __construct(ProductRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle()
  {
    return $this->repository->list();
  }
}
