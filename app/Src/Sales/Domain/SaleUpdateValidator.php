<?php 
namespace App\Src\Sales\Domain;

class SaleUpdateValidator {
  public function validate(string $status) {
    $validStatuses = ['PENDIENTE', 'PAGADA', 'DESPACHADA'];

    if (!in_array($status, $validStatuses)) {
        return redirect()->back()->with('error', 'Estado inválido.');
    }
  }
}