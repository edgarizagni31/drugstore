<?php

namespace App\Src\Roles\Application;

use App\Src\Roles\Domain\RoleRepositoryInterface;

class ListRolesHandler {
  private $repository;

  public function __construct(RoleRepositoryInterface $repository) 
  {
    $this->repository = $repository;
  }

  public function handle() {
    return $this->repository->list();
  }
}