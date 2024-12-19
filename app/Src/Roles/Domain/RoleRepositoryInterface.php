<?php 

namespace App\Src\Roles\Domain;

interface RoleRepositoryInterface {
  public function list();
  public function findById(int $id);

  public function create(array $data);

  public function update(int $id, array $data);

  public function delete(int $id);
}