<?php
namespace App\User\Application;

use App\User\Domain\UserRepositoryInterface;
use App\User\Domain\UserValidator;


class CreateUserHandler
{
  private $repository;
  private $validator;

  public function __construct(UserRepositoryInterface $repository, UserValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function handle(array $data)
  {
    $this->validator->validate($data);
    return $this->repository->create($data);
  }
}