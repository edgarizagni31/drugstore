<?php 

namespace App\Src\Sales\Infrastructure;

use App\Src\Sales\Domain\Sale;
use App\Src\Sales\Domain\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface {
  public function findById(int $id) {
    return Sale::find($id);
  }

  public function list() {
    return Sale::all();
  }

  public function create(array $data) {
    return Sale::create($data);
  } 

  public function update(int $id, array $data) {
    $Sale = Sale::findOrFail($id);

    $Sale->update($data);

    return $Sale;
  }
}
