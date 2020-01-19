<?php

namespace App\Mainframe\Http\Middleware;

use Closure;
use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Core\Traits\SendResponse;

class VerifyBearerToken
{
    use SendResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Try to find the user.
        $user =bearer();

        // Response error
        if (! $user) {
            return $this->response()
                ->fail('Not authenticated.(Invalid Bearer Token)', 401)
                ->json();
        }

        // Add logged user in the request attribute
        // $request->attributes->add(['logged_user' => $user]);
        // $request->attributes->add(['logged_user_id' => $user->id]);

        return $next($request);
    }
}