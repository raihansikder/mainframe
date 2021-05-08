<?php

namespace App\Projects\MyProject\Http\Controllers\Auth;

use App\Mainframe\Http\Controllers\Auth\RegisterController as MainframeRegisterController;
use App\Mainframe\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends MainframeRegisterController
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * If not group is specified then user will be registered to this default group;
     *
     * @var string
     */
    protected $defaultGroupName = 'user';

    /** @var array */
    protected $groupsAllowedForRegistration = [
        'user',
    ];

    /** @var string */
    protected $form = 'projects.my-project.auth.register';

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
            //'mobile'     => 'required|numeric|unique:users,mobile',
            'password' => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->setValidator($validator);

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (!$this->user) {
            $this->fail('User creation failed');

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
            'tenant_id' => request('tenant_id'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name').' '.request('last_name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'password' => Hash::make(request('password')),
            'group_ids' => [(string) $this->group->id],
            'is_active' => 1,
        ]);
    }

}
