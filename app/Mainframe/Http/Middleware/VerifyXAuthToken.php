<?php

namespace App\Mainframe\Http\Middleware;

use Auth;
use Closure;
use App\Mainframe\Features\Core\Traits\SendResponse;

class VerifyXAuthToken
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

        Auth::logout(); // Force to discard any user state.

        if (! $user = Auth::guard('x-auth')->user()) {
            return $this->failed('Authentication failed (X-Auth)', 401);
        }

        if ((! $user->can('make-api-call'))) {
            return $this->failed('Permission denied [make-api-cal]', 401);
        }

        // Onetime login for Api. DO NOT use it as it is of no use for the purpsoe.
        // if ($user->id) {
        //     \Auth::onceUsingId($user->id);
        // }

        return $next($request);
    }

}