<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Verified;

class VerificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Event::listen(Verified::class, function (Verified $event) {
            $user = $event->user;
            if ($user) {
                $user->status = 'active';
                $user->email_verified_at = $user->email_verified_at ?? now();
                $user->save();
            }
        });
    }
}
