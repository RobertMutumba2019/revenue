<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SysUser;

class TrackLastSeen
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('user_logged_in') && Session::has('user_id')) {
            SysUser::where('id', Session::get('user_id'))->update([
                'last_seen' => now(),
            ]);
        }

        return $next($request);
    }


}
