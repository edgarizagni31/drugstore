<?php

namespace App\Listeners;

use App\Events\UserAction;
use App\Models\Action;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveUserAction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserAction  $event
     * @return void
     */
    public function handle(UserAction $event)
    {
        Action::create([
            'action' => $event->action,
            'actionable_id' => $event->actionable->id,
            'actionable_type' => get_class($event->actionable),
            'user_id' => $event->user->id,
        ]);
    }
}
