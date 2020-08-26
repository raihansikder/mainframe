<?php

namespace App\Mainframe\Http\Middleware;

use Auth;
use Closure;

class AllowSuperuser
{
    /**
     * This mainframe middleware only allows super user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isSuperUser()) {
            return $next($request);
        }

        abort(403);
    }
}