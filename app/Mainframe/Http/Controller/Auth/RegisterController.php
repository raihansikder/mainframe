<?php

namespace App\Mainframe\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mainframe\Modules\Users\User;
use Illuminate\Auth\Events\Registered;
use App\Mainframe\Modules\Groups\Group;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mainframe\Providers\RouteServiceProvider;
use App\Mainframe\Http\Controller\BaseController;
use App\Mainframe\Notifications\Auth\VerifyEmail;

class RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /** @var User */
    public $user;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @param  null  $groupName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {

        $groupName = \Route::current()->parameter('groupName');

        $group = Group::byName($groupName);

        if (! $group) {
            $group = Group::byName('user');
        }

        return view('mainframe.auth.register')
            ->with(['group' => $group]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->attemptRegistration();

        request()->merge(['redirect_success' => route('login')]);
        $this->response()->redirectTo = $this->redirectTo();

        if ($this->response()->expectsJson()) {
            return $this->response()->load()->json();
        }

        return $this->response()->redirect();

    }

    /**
     * Process input for registration.
     *
     * @return $this
     */
    public function attemptRegistration()
    {
        // Validate
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->response($validator)->failValidation();

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (! $this->user) {
            $this->response()->fail('User creation failed');

            return $this;
        }

        $this->response()->success('Verify your email and log in.');
        $this->registered(request(), $this->user);

        return $this;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Mainframe\Modules\Users\User
     */
    protected function createUser()
    {
        return User::create([
            'tenant_id' => request('tenant_id'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name').' '.request('last_name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'group_ids' => request('group_ids'),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        event(new Registered($user));
        $user->notifyNow(new VerifyEmail());
    }
}
