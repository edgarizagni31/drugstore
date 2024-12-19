<?php 

namespace App\Src\Sales\Domain;

interface SaleRepositoryInterface {
  public function list();
  public function create(array $data);
  public function update(int $id, array $data);
  public function findById(int $id);
}
