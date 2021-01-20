<?php

namespace App\Mainframe\Http\Middleware;

use Auth;
use Closure;
use App\Mainframe\Features\Core\Traits\SendResponse;

class InjectTenant
{
    use SendResponse;

    /**
     * Check if the request contains a valid X-Auth-Token and client-id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            /** @var \App\User $user */
            $user = Auth::user();
            if ($user->ofTenant()) {
                request()->merge(['tenant_id' => $user->tenant_id]);
            }
        }

        return $next($request);
    }

}