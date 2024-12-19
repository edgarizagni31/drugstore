<?php 

namespace App\Src\Products\Application;

use App\Src\Products\Domain\ProductRepositoryInterface;
use App\Src\Products\Domain\ProductValidator;
use App\Src\Users\Application\Events\UserAction;
use Auth;

class CreateProductHandler {
  private $repository;
  private $validator;

  public function __construct(ProductRepositoryInterface $repository, ProductValidator $validator) {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function handle($data) {
    $this->validator->validate($data);

    $data['stock_actual'] = $data['quantity'];
    $user = Auth::user();
    $product = $this->repository->create($data);

    UserAction::dispatch($user, 'PRODUCT_CREATED', $product);

    return $product;
  }
}