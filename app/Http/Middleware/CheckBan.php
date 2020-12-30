<?php

namespace App\Http\Middleware;

use Closure;

class CheckBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->auth_member_ban() == "Banned") {
            auth()->logout();

            $message = 'Your account is suspended!
            Please contact one of our gym staff for further information.';

            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}
