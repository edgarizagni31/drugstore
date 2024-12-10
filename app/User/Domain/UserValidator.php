<?php
namespace App\User\Domain;

use Illuminate\Validation\Factory as ValidatorFactory;

class UserValidator
{
  private $validator;

  public function __construct(ValidatorFactory $validator)
  {
    $this->validator = $validator;
  }

  public function validate(array $data)
  {
    $rules = [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users',
      'password' => ['required', 'confirmed'],
      'role_id' => 'required|exists:roles,id',
    ];

    $this->validator->make($data, $rules)->validate();
  }
}