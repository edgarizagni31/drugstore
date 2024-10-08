<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReport extends Model
{
    use HasFactory;
    protected $fillable = ['quanty', 'status', 'product_id'];


    public function action()
    {
        return $this->morphToMany(Action::class, 'actionable');
    }

    public function product()
    {
        return $this->belongsTo(StockReport::class, 'product_id');
    }
}
