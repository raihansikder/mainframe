<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Mainframe\Traits\IsoOutput;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use IsoOutput;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
     */

    public function login(Request $request) {
        $this->validateLogin($request);

        if ($user = User::where($this->username(), $request->get($this->username()))->first()) {
            if (is_null($user->email_verified_at)) {
                return $this->sendFailedLoginResponse($request, 'Email not verified');
            }
            if (($user->is_active !== 1)) {
                return $this->sendFailedLoginResponse($request, 'User is not active');
            }
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request) {

        /** @var $request \Illuminate\Support\Facades\Request */
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the failed login response instance.
     * @param  \Illuminate\Http\Request $request
     * @param  string $msg
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function sendFailedLoginResponse(Request $request, $msg = '') {
        // Handle api login through ret.json Middleware
        if ($request->get('ret') === 'json') {
            $ret = ret('fail', "Login failed. " . $msg, ['data' => [trans('auth.failed')]]);
            return Response::json(fillRet($ret));
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Redirect the user after determining they are locked out.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendLockoutResponse(Request $request) {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        // Handle api login through ret.json Middleware
        if ($request->get('ret') === 'json') {
            $ret = ret('fail', "Login failed", ['data' => [Lang::get('auth.throttle', ['seconds' => $seconds])]]);
            return Response::json(fillRet($ret));
        }

        throw ValidationException::withMessages([
            $this->username() => [Lang::get('auth.throttle', ['seconds' => $seconds])],
        ])->status(429);
    }

    /**
     * The user has been authenticated.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function authenticated(Request $request, $user) {
        // Generate auth_token for this login
        $user->auth_token = $user->generateAuthToken();

        // For first login send email
        if ($user->first_login_at === null) {
            $user->first_login_at = now();
            if ($user->social_account_id !== null) {
                $user->firstLoginNotification();
            }

            // Check for recommender user group
            if ($user->group_ids_csv == 8) {
                // Create recommender user account on sendbird
                $user->createSendBirdAccount();
            }
        }

        $user->last_login_at = now();
        $user->save();

        // Handle api login through ret.json Middleware
        if ($request->get('ret') === 'json') {
            $ret = ret('success', "Login success", ['data' => $user]);
            return Response::json(fillRet($ret));
        }

    }

    /**
     * Social login
     * @param  \Illuminate\Http\Request $request
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function socialLogin(Request $request) {
        // First validated

        $validator = Validator::make($request->all(), [
            'social_account_id' => 'required',
            'social_account_type' => 'required',
            'group_id' => 'required',
            'email' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $ret = ret('fail', "Validation error(s)", ['validation_errors' => json_decode($validator->messages(), true)]);
        } // If validator passes
        else {
            // First check if a user with same email already exists.
            $email = trim(strtolower($request->get('email')));
            $user = User::where('email', $email)->first();
            $social_account_var = $request->get('social_account_type') . "_account_id";
            if ($user && $user->$social_account_var != $request->get($social_account_var)) {
                $ret = ret('fail', "Email already exists.");
                return $this->jsonOrRedirect($ret, $validator);
            }
            $new_registration = 0;
            // If user with same email already exists than only update the fields.
            if ($user) {

                $user->fill($request->all());
                $user->email = $email;

                // Breakdown name to first and last name
                $name_parts = explode(' ', $request->get('name'));

                if (!isset($user->first_name)) {
                    $user->first_name = $name_parts[0] ?? '';
                }

                if (!isset($user->last_name)) {
                    $user->last_name = str_replace($user->first_name, '', $user->name);
                }
                if (empty($user->last_name)) {
                    $user->last_name = $user->first_name;
                }
                $user->full_name = $user->name;
            } else { // If users do not exist then create the user

                $user = new User($request->all());
                $user->password = Hash::make(randomString());

                $user->first_login_at = now();
                $user->email_confirmed = 1;
                // Breakdown name to first and last name
                $name_parts = explode(' ', $request->get('name'));

                if (!isset($user->first_name)) {
                    $user->first_name = $name_parts[0] ?? '';
                }

                if (!isset($user->last_name)) {
                    $user->last_name = str_replace($user->first_name, '', $user->name);
                }
                if (empty($user->last_name)) {
                    $user->last_name = $user->first_name;
                }
                $user->full_name = $user->name;
                // Send Welcome email notification
                $user->firstLoginNotification();
                $new_registration = 1;
            }

            $user->last_login_at = now();

            // Set auth token (bearer token)
            $user->auth_token = $user->generateAuthToken();
            /** Fill the json */
            $user->group_ids = json_encode([$request->get('group_id')]);

            // dd($user);
            if ($user->save()) {
                $user = User::find($user->id);
                // Check for recommender user group and the user don't have sendbird account
                if ($user->group_ids_csv == 8 && $user->has_sendbird_account == 0) {
                    // Create recommender user account on sendbird
                    $user->createSendBirdAccount();
                }
                // Send Email Verificarion email notification
                if ($new_registration == 1) {
                    $user->sendRegistrationWithVerificationNotification();
                }
                $ret = ret('success', "Login success", ['data' => $user]);
            } else {
                $ret = ret('fail', "Login not successful");
            }
        }
        $request->merge(['redirect_success' => route('login')]);
        //\Request::merge(['redirect_fail' => \Redirect::route('login')]);
        return $this->jsonOrRedirect($ret, $validator);

    }

    /**
     * Log the user out of the application.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $user = user();

        $this->guard()->logout();

        $request->session()->invalidate();

        if ($user->isRecommender()) {
            return redirect(route('shop.login'));
        }

        return $this->loggedOut($request) ?: redirect('/');
    }

}
