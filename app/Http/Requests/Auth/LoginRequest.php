<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

    // Build credentials with only email and password. We do a post-auth
    // check for the user's `status` to avoid SQL errors when the column
    // doesn't exist (migration may not have been run).
    $credentials = $this->only('email', 'password');

    if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            // set lockout decay: 10 seconds on both email+ip and ip-only keys (testing)
            $decay = 10;
            $emailThreshold = 1; // TEMPORARY testing threshold
            $ipThreshold = 1; // TEMPORARY testing threshold

            RateLimiter::hit($this->throttleKey(), $decay);
            RateLimiter::hit($this->ipThrottleKey(), $decay);
            Log::info('login.failed_hit', ['throttle' => $this->throttleKey(), 'ip_key' => $this->ipThrottleKey()]);

            // Debug: log current attempts and time remaining for visibility during testing
            $emailAttempts = RateLimiter::attempts($this->throttleKey());
            $ipAttempts = RateLimiter::attempts($this->ipThrottleKey());
            $emailAvailableAfter = RateLimiter::availableIn($this->throttleKey());
            $ipAvailableAfter = RateLimiter::availableIn($this->ipThrottleKey());
            Log::debug('login.debug_attempts', ['emailAttempts' => $emailAttempts, 'ipAttempts' => $ipAttempts, 'emailAvailableAfter' => $emailAvailableAfter, 'ipAvailableAfter' => $ipAvailableAfter]);

            // If this hit caused the limiter to exceed the thresholds, flash the remaining
            // seconds so the view can render an immediate countdown instead of a generic
            // "credentials failed" message.
            $emailTooMany = RateLimiter::tooManyAttempts($this->throttleKey(), $emailThreshold);
            $ipTooMany = RateLimiter::tooManyAttempts($this->ipThrottleKey(), $ipThreshold);

            if ($emailTooMany || $ipTooMany) {
                Log::warning('login.throttled', ['throttle' => $this->throttleKey(), 'ip_key' => $this->ipThrottleKey(), 'emailTooMany' => $emailTooMany, 'ipTooMany' => $ipTooMany]);

                event(new Lockout($this));

                $emailAvailable = RateLimiter::availableIn($this->throttleKey());
                $ipAvailable = RateLimiter::availableIn($this->ipThrottleKey());
                $seconds = max($emailAvailable, $ipAvailable);

                $this->session()->flash('throttle_seconds', $seconds);
                $this->session()->flash('throttle_expires_at', time() + $seconds);

                throw ValidationException::withMessages([
                    'throttle' => trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ]);
            }

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // At this point the user is authenticated. Ensure their status is
        // allowed. If the `status` column doesn't exist this will return
        // null and the check will pass through (treated as not active),
        // so we explicitly handle that case.
        $user = Auth::user();

        // If the status attribute exists and is not 'active', block login.
        if (isset($user->status) && $user->status !== 'active') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Akun Anda belum aktif atau telah ditolak.',
            ]);
        }

        // clear both keys on successful login
        RateLimiter::clear($this->throttleKey());
        RateLimiter::clear($this->ipThrottleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
    // TEMPORARY: lower thresholds to 1 for testing -> immediately trigger throttle
    $emailTooMany = RateLimiter::tooManyAttempts($this->throttleKey(), 1);
    $ipTooMany = RateLimiter::tooManyAttempts($this->ipThrottleKey(), 1);

        if (! $emailTooMany && ! $ipTooMany) {
            return;
        }

        Log::warning('login.throttled', ['throttle' => $this->throttleKey(), 'ip_key' => $this->ipThrottleKey(), 'emailTooMany' => $emailTooMany, 'ipTooMany' => $ipTooMany]);

        event(new Lockout($this));

        // choose the larger remaining time so the client shows the correct wait
        $emailAvailable = RateLimiter::availableIn($this->throttleKey());
        $ipAvailable = RateLimiter::availableIn($this->ipThrottleKey());
        $seconds = max($emailAvailable, $ipAvailable);

        // make the remaining seconds and absolute unlock timestamp available to the view so we can show a client-side countdown
        $this->session()->flash('throttle_seconds', $seconds);
        $this->session()->flash('throttle_expires_at', time() + $seconds);

        throw ValidationException::withMessages([
            'throttle' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the IP-only rate limiting key.
     */
    protected function ipThrottleKey(): string
    {
        return 'login-ip|'.$this->ip();
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
