<?php

namespace App\Product\Application;

use App\Product\Domain\ProductRepositoryInterface;

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
