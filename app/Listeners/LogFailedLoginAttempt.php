<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLoginAttempt
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
    public function handle(object $event): void
    {
        //
        $request = request(); // Get the current request instance

        $data = [
            'email' => $event->credentials['email'] ?? 'N/A',
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'cookies' => $request->cookie(), // Access cookies
        ];

        Log::warning('Failed login attempt', $data);
    }
}
