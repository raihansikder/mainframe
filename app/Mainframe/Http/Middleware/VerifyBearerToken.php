<?php

namespace App\Mainframe\Http\Middleware;

use Closure;
use Response;
use App\Mainframe\Modules\Users\User;

class VerifyBearerToken
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

        // Try to find the user.
        $user = User::ofBearer($request->bearerToken());

        // Response error
        if (! $user) {
            return Response::json([
                'error' => true,
                'message' => 'Not authenticated',
                'code' => 401,
            ], 401);
        }

        // Add logged user in the request attribute
        $request->attributes->add(['logged_user' => $user]);
        $request->attributes->add(['logged_user_id' => $user->id]);

        return $next($request);
    }
}