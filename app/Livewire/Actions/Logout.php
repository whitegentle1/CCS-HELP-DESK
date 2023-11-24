<?php

namespace App\Livewire\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     * 
     */
    public function __invoke(): void
    {
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $log_history = [
            'email' => Auth::user()->email,
            'activity' => 'Logout',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'logout_time' => $todayDate
        ];

        DB::table('login_history')->insert($log_history);
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
    }
}
