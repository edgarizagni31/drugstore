<?php
namespace App\Product\Domain;

use Illuminate\Validation\Factory as ValidatorFactory;

class ProductValidator
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
      'unit_value' => 'required|numeric',
      'total_value' => 'required|numeric',
      'quantity' => 'required|numeric',
      'due_date' => 'required|date',
      'supplier_id' => 'required|exists:suppliers,id',
      'category_id' => 'required|exists:categories,id',
    ];

    $this->validator->make($data, $rules)->validate();
  }
}