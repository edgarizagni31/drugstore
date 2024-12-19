<?php 

namespace App\Src\Roles\Application;

use App\Src\Roles\Domain\RoleValidator;
use App\Src\Roles\Infrastructure\RoleRepository;

class CreateRoleHandler {
  private $repository;
  private $validator;
  
  public function __construct(RoleRepository $repository, RoleValidator $validator) 
  { 
    $this->repository = $repository; 
    $this->validator = $validator;
  }

  public function handle($data) 
  {
    $this->validator->validate($data);

    return $this->repository->create($data);
  }
}