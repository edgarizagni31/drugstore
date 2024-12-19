<?php 

namespace App\Src\Roles\Infrastructure;

use App\Src\Roles\Domain\Role;
use App\Src\Roles\Domain\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface {
  public function list() {
    return Role::all();
  }

  public function findById(int $id): Role {
    return Role::find($id);
  }

  public function create(array $data) {
    return Role::create($data);
  } 

  public function update(int $id, array $data) {
    $role = Role::findOrFail($id);

    $role->update($data);

    return $role;
  }

  public function delete(int $id) {
    return Role::destroy($id);
  }
}
