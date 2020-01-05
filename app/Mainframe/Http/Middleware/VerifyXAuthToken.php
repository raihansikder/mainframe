<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Http\Middleware;

use Closure;
use Response;
use App\Mainframe\Modules\Users\User;

class VerifyXAuthToken
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
        $client_id = request('client-id') ?: request()->header('client-id');


        /** @var User $user */
        $user = User::where('api_token', $api_token)->where('id', $client_id)
            ->remember(timer('short'))->first();

        if (!$user) {
            return Response::json([
                'error' => true,
                'message' => 'Not authenticated.(X-Auth-Token not matched)',
                'code' => 401,
            ], 401);
        }

        if ((!$user->can('accessApi'))) {
            return Response::json([
                'error' => true,
                'message' => 'User/Device does not have permission to make API calls',
                'code' => 401,
            ], 401);
        }

        return $next($request);
    }
}