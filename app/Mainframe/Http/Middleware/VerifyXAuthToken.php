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

        $apiToken = $request->header('X-Auth-Token');
        $clientId = request('client-id') ?: request()->header('client-id');

        $user = $this->fetchUser($apiToken, $clientId);

        if (! $user) {
            return $this->response()
                ->fail('Not authenticated.(X-Auth-Token not matched)', 401)
                ->json();
        }

        if ((! $user->hasPermission('api'))) {

            return $this->response()
                ->fail('User/Device does not have permission to make API calls', 401)
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
    public function fetchUser($apiToken, $clientId)
    {
        return User::where('api_token', $apiToken)
            ->where('id', $clientId)
            ->remember(timer('short'))->first();
    }
}