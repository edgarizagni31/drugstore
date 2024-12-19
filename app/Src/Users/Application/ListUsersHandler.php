<?php
namespace App\Src\Users\Application;

use App\Src\Users\Domain\UserRepositoryInterface;

class ListUsersHandler
{
  private $repository;

  public function __construct(UserRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle()
  {
    return $this->repository->list();
  }
}