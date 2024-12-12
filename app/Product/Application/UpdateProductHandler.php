<?php 
namespace App\Product\Application;

use App\Events\UserAction;
use App\Product\Application\Events\StockUpdate;
use App\Product\Domain\ProductRepositoryInterface;
use App\Product\Domain\ProductValidator;
use Auth;

class UpdateProductHandler {
  private $repository;
  private $validator;

  public function __construct(ProductRepositoryInterface $repository, ProductValidator $validator) {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function handle(int $id, array $data, int $oldQuantity) {
    $this->validator->validate($data);
    
    $data['stock_actual'] = $data['quantity'];
    $user = Auth::user();
    $product = $this->repository->update($id, $data);

    UserAction::dispatch($user, 'PRODUCT_UPDATED', $product);

    if ($oldQuantity != $data['quantity']) {
      StockUpdate::dispatch($user, $product, $oldQuantity, $data['quantity']);
    }

    return $product;
  }
}