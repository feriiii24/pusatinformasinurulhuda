<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Login;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Verified::class, function (Verified $event) {
            $user = $event->user;
            if ($user && method_exists($user, 'save')) {
                $user->status = 'active';
                $user->email_verified_at = $user->email_verified_at ?? now();
                $user->save();
            }
        });

        // Also ensure that if a user logs in and their email is already verified in DB,
        // we set status to active (covers manual DB changes to email_verified_at).
        Event::listen(Login::class, function (Login $event) {
            $user = $event->user;
            if ($user && method_exists($user, 'save')) {
                // only mark active if email_verified_at exists in DB
                if (!empty($user->email_verified_at) && (($user->status ?? '') !== 'active')) {
                    $user->status = 'active';
                    $user->save();
                }
            }
        });
    }
}
