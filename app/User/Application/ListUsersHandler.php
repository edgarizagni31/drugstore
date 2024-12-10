<?php
namespace App\User\Application;

use App\User\Domain\UserRepositoryInterface;


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