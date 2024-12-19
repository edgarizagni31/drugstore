<?php

namespace App\Src\Sales\Domain;

use App\Src\Tickets\Domain\Ticket;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'aggregate_id',
        'event_type',
        'event_data',
    ];
    public $timestamps = false;

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
