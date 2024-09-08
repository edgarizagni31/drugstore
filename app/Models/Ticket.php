<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_value',
        'total_value',
        'status',
        'product_id',
    ];

    protected $casts = [
        'total_value' => 'decimal:2',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
