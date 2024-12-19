<?php
namespace App\Src\Users\Application;

use App\Src\Users\Domain\UserRepositoryInterface;
use App\Src\Users\Domain\UserValidator;

class UpdateUserHandler
{
  private $repository;
  private $validator;

  public function __construct(UserRepositoryInterface $repository, UserValidator $validator)
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