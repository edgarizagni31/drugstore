<?php 

namespace App\Src\Products\Infrastructure;
use App\Src\Products\Domain\Product;
use App\Src\Products\Domain\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface {
  public function create(array $data)
  {
    return Product::create($data);
  }

  public function update(int $id, array $data)
  {
    $product = Product::findOrFail($id);
    $product->update($data);
    return $product;
  }

  public function delete(int $id)
  {
    return Product::destroy($id);
  }

  public function findById(int $id)
  {
    return Product::find($id);
  }

  public function list()
  {
    return Product::with(['category', 'supplier'])->get();
  }
}