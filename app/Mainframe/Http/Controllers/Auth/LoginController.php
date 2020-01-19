<?php

namespace App\Mainframe\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Mainframe\Providers\RouteServiceProvider;
use App\Mainframe\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /** @var string */
    protected $form = 'mainframe.auth.login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
    }

    /*
     * Mainframe overrides
     */
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view($this->form);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($this->response()->expectsJson()) {
            return $this->response()->fail(trans('auth.failed'))->json();
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mainframe\Modules\Users\User|mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {

        $user->generateAuthToken();

        if ($this->response()->expectsJson()) {
            return $this->response()->success()->load($user->refresh())->json();
        }
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        if ($this->response()->expectsJson()) {
            return $this->response()->success('Logged out')->json();
        }
    }

}
