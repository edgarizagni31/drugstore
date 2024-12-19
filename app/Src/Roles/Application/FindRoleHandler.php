<?php
namespace App\Src\Roles\Application;

use App\Src\Roles\Infrastructure\RoleRepository;


class FindRoleHandler
{
  private $repository;

  public function __construct(RoleRepository $repository)
  {
    $this->repository = $repository;
  }

  public function handle(int $id)
  {
    return $this->repository->findById($id);
  }
}