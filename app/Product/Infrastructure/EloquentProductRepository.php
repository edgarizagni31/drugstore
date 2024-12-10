<?php 

namespace App\Product\Infraestructure;
use App\Product\Domain\Product;
use App\Product\Domain\ProductRepositoryInterface;

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
    return Product::with('role')->get();
  }
}