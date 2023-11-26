<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|string|email')]
    public string $email = '';

    #[Rule('required|string')]
    public string $password = '';

    #[Rule('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $dt = Carbon::now();
        $dt = Carbon::now('Asia/Singapore');
        $todayDate = $dt->toDayDateTimeString();

        $email = $this->email;
        $log_history = [
            'email' => $email,
            'activity' => 'Login',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'login_time' => $todayDate
        ];

        $this->ensureIsNotRateLimited();

        if (Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            // Check if login history has already been recorded
            if (!$this->loginHistoryRecorded()) {
                // Successful login attempt
                DB::table('login_history')->insert($log_history);

                // Set the flag to indicate that login history has been recorded
                $this->recordLoginHistory();
            }

            RateLimiter::clear($this->throttleKey());
        } else {
            // Unsuccessful login attempt
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
    protected function loginHistoryRecorded(): bool
    {
        // Implement logic to check whether login history has already been recorded for the current session/user
        // You can use a session variable, database flag, or any other method to track this
        // Return true if recorded, false otherwise
        return session()->has('login_history_recorded');
    }

    protected function recordLoginHistory(): void
    {
        // Set the flag to indicate that login history has been recorded
        session(['login_history_recorded' => true]);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}
