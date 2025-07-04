<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SessionTimeout
{
    protected $timeout = 1800; // 30 minutes in seconds

    public function handle($request, Closure $next)
    {
        if (Session::has('last_activity')) {
            $inactive = time() - Session::get('last_activity');

            if ($inactive > $this->timeout) {
                Session::flush();
                return redirect('/')->withErrors(['message' => 'Session timed out due to inactivity.']);
            }
        }

        Session::put('last_activity', time());
        return $next($request);
    }
}
