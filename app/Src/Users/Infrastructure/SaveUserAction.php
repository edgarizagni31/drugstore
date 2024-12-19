<?php

namespace App\Src\Users\Infrastructure;

use App\Models\Action;
use App\Src\Users\Application\Events\UserAction;

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
     * @param \App\Src\Users\Application\Events\UserAction $event
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
