<?php

namespace App\Mainframe\Http\Middleware;

use Closure;

class RequestJson
{
    /**
     * Mainframe uses ret=json in HTTP parameter to request a json response
     * from the server. This middleware injects this param.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! request('ret') || request('ret') != 'json') {
            request()->merge(['ret' => 'json']);
        }

        return $next($request);
    }
}