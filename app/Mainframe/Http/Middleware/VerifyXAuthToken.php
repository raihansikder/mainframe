<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Http\Middleware;

use Closure;
use App\Mainframe\Modules\Users\User;
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

        // $apiToken = $request->header('X-Auth-Token', null);
        // $clientId = $request->header('client-id', null);

        $user = user();

        if (! $user) {
            return $this->response()
                ->fail('Not authenticated.(Invalid X-Auth-Token)', 401)
                ->json();
        }

        if ((! $user->can('make-api-call'))) {

            return $this->response()
                ->fail('Permission denied (make-api-cal)', 401)
                ->json();

        }

        return $next($request);
    }

    /**
     * Fetch matching user.
     *
     * @param $apiToken
     * @param $clientId
     * @return mixed|User
     */
    // public function fetchUser($apiToken, $clientId)
    // {
    //     return User::where('api_token', $apiToken)
    //         ->where('id', $clientId)
    //         ->remember(timer('short'))->first();
    // }
}