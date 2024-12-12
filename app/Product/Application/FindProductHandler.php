<?php
namespace App\Product\Application;

use App\Product\Domain\ProductRepositoryInterface;

class FindProductHandler
{
  private $repository;

  public function __construct(ProductRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(int $id)
  {
    return $this->repository->findById($id);
  }
} 