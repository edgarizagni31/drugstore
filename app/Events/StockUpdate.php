<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $product;
    public $oldQuantity;
    public $newQuantity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $product, $oldQuantity, $newQuantity)
    {
        $this->user = $user;
        $this->product = $product;
        $this->oldQuantity = $oldQuantity;
        $this->newQuantity = $newQuantity;
    }
}
