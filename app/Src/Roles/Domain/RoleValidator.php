<?php 

namespace App\Src\Roles\Domain;

use Illuminate\Validation\Factory as ValidatorFactory;

class RoleValidator {
  private $validator;

  public function __construct(ValidatorFactory $validator) {
    $this->validator = $validator;
  }

  public function validate($data) {
    $rules = [
      'name' => 'required|string|max:255',
    ];

    $this->validator->make($data, $rules)->validate();
  }
}