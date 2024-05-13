<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignUserRole
{
    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // Asignar el rol de cliente (priority 0) por defecto al nuevo usuario
        $event->user->priority = 2;
        $event->user->save();
    }
}

