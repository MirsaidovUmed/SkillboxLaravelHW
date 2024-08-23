<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\Welcome;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event)
    {
        try {
            Mail::to($event->user->email)->send(new Welcome($event->user));
        } catch (Exception $e) {
            Log::error('Ошибка при отправке письма пользователю ' . $event->user->email . ': ' . $e->getMessage());
        }
    }
}
