<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Report extends Model
{
    use HasFactory;

    protected $cast = [
        "event_data" => "array"
    ];

    protected function event_data()
    {
        return Attribute::set(
            function (array $value) {
                return json_encode($value);
            }
        );
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'report_sales');
    }
}
