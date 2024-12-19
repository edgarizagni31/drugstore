<?php 

namespace App\Src\Sales\Domain;

use Illuminate\Validation\Factory as ValidatorFactory;

class SaleValidator {
  private $validator;

  public function __construct(ValidatorFactory $validator) {
    $this->validator = $validator;
  }

  public function validate($data) {
    $rules = [
      'tickets' => 'required|array',
      'tickets.*.product_id' => 'required|exists:products,id',
      'tickets.*.quantity' => 'required|integer|min:1',
      'tickets.*.unit_value' => 'required|numeric',
    ];

    $this->validator->make($data, $rules)->validate();
  }
}