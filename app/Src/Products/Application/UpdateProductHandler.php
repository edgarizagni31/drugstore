<?php 
namespace App\Src\Products\Application;

use App\Src\Products\Application\Events\StockUpdate;
use App\Src\Products\Domain\ProductRepositoryInterface;
use App\Src\Products\Domain\ProductValidator;
use App\Src\Users\Application\Events\UserAction;
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