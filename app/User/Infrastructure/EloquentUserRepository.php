<?php

namespace App\User\Infrastructure;

use App\User\Domain\User;
use App\User\Domain\UserRepositoryInterface;

class EloquentUserRepository implements UserRepositoryInterface
{
  public function create(array $data)
  {
    return User::create($data);
  }

  public function update(int $id, array $data)
  {
    $user = User::findOrFail($id);
    $user->update($data);
    return $user;
  }

  public function delete(int $id)
  {
    return User::destroy($id);
  }

  public function findById(int $id)
  {
    return User::find($id);
  }

  public function list()
  {
    return User::with('role')->get();
  }
}