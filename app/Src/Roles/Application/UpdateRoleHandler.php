<?php
namespace App\Src\Roles\Application;

use App\Src\Roles\Domain\RoleRepositoryInterface;
use App\Src\Roles\Domain\RoleValidator;

class UpdateRoleHandler
{
  private $repository;
  private $validator;

  public function __construct(RoleRepositoryInterface $repository, RoleValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function handle(int $id, array $data)
  {
    $this->validator->validate($data);
    return $this->repository->update($id,$data);
  }
}