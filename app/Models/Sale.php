<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
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

    public function ticket()
    {
        return $this->belongsToMany(Ticket::class, 'sale_tickets');
    }
}
