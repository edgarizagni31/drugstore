<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_value',
        'total_value',
        'quantity',
        'stock_actual',
        'due_date',
        'supplier_id',
        'category_id',
    ];

    public function stockReports() {
        return $this->hasMany(StockReport::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
