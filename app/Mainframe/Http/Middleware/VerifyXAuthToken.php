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

        \Auth::logout(); // End user session.

        $user = apiCaller();

        if (! $user) {
            return $this->failed('Not authenticated.(Invalid X-Auth-Token)', 401);
        }

        if ((! $user->can('make-api-call'))) {
            return $this->failed('Permission denied (make-api-cal)', 401);
        }

        return $next($request);
    }


}