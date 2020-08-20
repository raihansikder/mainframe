<?php

namespace App\Mainframe\Http\Controllers\Auth;

use App\User;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mainframe\Providers\RouteServiceProvider;
use App\Mainframe\Notifications\Auth\VerifyEmail;
use App\Mainframe\Http\Controllers\BaseController;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /** @var User */
    protected $user;

    /** @var Group */
    protected $group;

    /** @var array */
    protected $groupsAllowedForRegistration = [
        'tenant-admin',
        'user',
        'test-group',
    ];

    /** @var string */
    protected $defaultGroupName = 'user';

    /** @var string */
    protected $form = 'mainframe.auth.register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
        $this->resolveGroup();
        $this->user = null; // Set current user as null

    }

    /**
     * Result group based on the registration url param.
     */
    public function resolveGroup()
    {
        // Get group from url parameter register/{groupName}
        if (\Route::current()) {
            $groupName = \Route::current()->parameter('groupName');
            $this->group = Group::byName($groupName);
        }

        // If not group defined in url then register in default 'user' group.
        if (! $this->group) {
            $this->group = Group::byName($this->defaultGroupName);
        }

    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     */
    public function showRegistrationForm()
    {

        if (! $this->groupAllowed()) {
            return $this->permissionDenied('Group not allowed for registration');
        }

        return view($this->form)
            ->with(['group' => $this->group]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        if (! $this->groupAllowed()) {
            return $this->permissionDenied();
        }

        $this->attemptRegistration();

        if (! $this->user) { // Redirect to register page if failed
            $this->redirectTo = route('register', $this->group->name);
        }

        return $this->load($this->user)->dispatch();

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
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->setValidator($validator);

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (! $this->user) {
            $this->fail('Registration was not successful');

            return $this;
        }

        $this->success('Verify your email and log in.');
        $this->registered(request(), $this->user);

        return $this;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function createUser()
    {
        return User::create([
            'tenant_id'  => request('tenant_id'),
            'first_name' => request('first_name'),
            'last_name'  => request('last_name'),
            'name'       => request('first_name').' '.request('last_name'),
            'email'      => request('email'),
            'password'   => Hash::make(request('password')),
            'group_ids'  => [(string) $this->group->id],
            'is_active'  => 1,
        ]);
    }

    /**
     * The user has been successfully registered.
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

    /**
     * Check if the group is allowed for registration.
     *
     * @return bool
     */
    public function groupAllowed()
    {
        if (! in_array($this->group->name, $this->groupsAllowedForRegistration)) {

            return false;
        }

        return true;
    }

}
