<?php
namespace App\Src\Roles\Application;

use App\Src\Roles\Domain\RoleRepositoryInterface;

class DeleteRoleHandler
{
  private $repository;

  public function __construct(RoleRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(int $id)
  {
    return $this->repository->delete($id);
  }
}