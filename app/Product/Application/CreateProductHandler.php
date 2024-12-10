<?php 

namespace App\Product\Application;

use App\Product\Domain\ProductRepositoryInterface;
use App\Product\Domain\ProductValidator;

class CreateProductHandler {
  private $repository;
  private $validator;

  public function __construct(ProductRepositoryInterface $repository, ProductValidator $validator) {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function handle($data) {
    $this->validator->validate($data);

    $product = $this->repository->create($data);

    return $product;
  }
}