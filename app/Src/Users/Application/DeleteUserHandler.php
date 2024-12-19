<?php
namespace App\Src\Users\Application;

use App\Src\Users\Domain\UserRepositoryInterface;

class DeleteUserHandler
{
  private $repository;

  public function __construct(UserRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(int $id)
  {
    return $this->repository->delete($id);
  }
}