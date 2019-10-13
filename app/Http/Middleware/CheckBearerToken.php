<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckBearerToken
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

        // Try to find the user.
        $user = User::ofBearer($request->bearerToken());

        // Response error
        if (!isset($user->id)) {
            return \Response::json([
                'error' => true,
                'message' => 'Not authenticated',
                'code' => 401,
            ], 401);
        }
        $request->attributes->add(['logged_user' => $user]);
        $request->attributes->add(['logged_user_id' => $user->id]);
        return $next($request);
    }
}
