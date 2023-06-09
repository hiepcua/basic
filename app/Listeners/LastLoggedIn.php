<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LastLoggedIn
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
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->last_login_at = now()->toDateTimeString();
        $event->user->last_login_ip = request()->ip();
        $event->user->save();
    }
}
