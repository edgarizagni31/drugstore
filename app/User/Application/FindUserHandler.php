<?php
namespace App\User\Application;

use App\User\Domain\UserRepositoryInterface;
use App\User\Domain\UserValidator;


class FindUserHandler
{
  private $repository;

  public function __construct(UserRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle(int $id)
  {
    return $this->repository->findById($id);
  }
}