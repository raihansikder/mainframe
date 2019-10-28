<?php

namespace App\Http\Middleware;

use App\Mainframe\Modules\Users\User;
use Closure;

class ValidateXAuthToken
{
    /**
     * Check if the request contains a valid X-Auth-Token and client-id
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $api_token = $request->header('X-Auth-Token');
        // resolve client_id
        $client_id = null;
        if ($request->has('client-id')){
            $client_id = $request->get('client-id');
        }
        else $client_id = $request->header('client-id');

        /** @var User $user */
        $user = User::where('api_token', $api_token)->where('id', $client_id)->remember(cacheTime('short'))->first();
        if (!$user) {
            return \Response::json([
                'error' => true,
                'message' => 'Not authenticated.(X-Auth-Token not matched)',
                'code' => 401,
            ], 401);
        } else if ((!$user->canMakeApiCall())) {
            return \Response::json([
                'error' => true,
                'message' => 'User/Device does not have permission to make API calls',
                'code' => 401,
            ], 401);
        }
        return $next($request);
    }
}
