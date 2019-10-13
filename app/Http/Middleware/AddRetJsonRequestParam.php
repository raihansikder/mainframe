<?php

namespace App\Http\Middleware;

use Closure;

class AddRetJsonRequestParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Adds ret = json by default for all routes using this filter.
        if (!\Request::has('ret') || \Request::get('ret') != 'json') {
            \Request::merge(['ret' => 'json']);
        }
        return $next($request);
    }
}
