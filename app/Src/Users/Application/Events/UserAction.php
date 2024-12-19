<?php

namespace App\Src\Users\Application\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserAction implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $action;
    public $actionable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $action, $actionable)
    {
        $this->user = $user;
        $this->action = $action;
        $this->actionable = $actionable;
    }

}
