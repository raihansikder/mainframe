<?php

namespace App\Projects\MyProject\Http\Controllers\Auth;

use App\Mainframe\Http\Controllers\Auth\RegisterTenantController;
use App\Projects\MyProject\Modules\Resellers\Reseller;
use App\Projects\MyProject\Notifications\Auth\ResellerVerifyEmail;
use App\Projects\MyProject\Notifications\Register\ResellerRegistered;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class RegisterResellerController extends RegisterTenantController
{

    public const GROUP_ID = 21;

    /** @var \App\Projects\MyProject\Modules\Resellers\Reseller */
    public $reseller;

    /** @var \App\User */
    public $user;

    /** @var string */
    protected $form = 'projects.my-project.auth.register-reseller';


    /**
     * Process input for registration.
     *
     * @return $this
     */
    public function attemptRegistration()
    {
        // Validate
        $validator = Validator::make(request()->all(), [
            'reseller_name' => 'required|unique:resellers,name',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->failValidation();

            return $this;
        }

        // Validation success. Now create reseller
        $this->reseller = $this->createReseller();
        if (! $this->reseller) {
            $this->fail('Reseller creation failed');

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (! $this->user) {
            $this->fail('User creation failed');
            Reseller::where('id', $this->reseller->id)->forceDelete();

            return $this;
        }

        $this->success('Verify your email and log in.');
        $this->registered(request(), $this->user);

        return $this;

    }

    /**
     * Create a reseller
     *
     * @return \App\Projects\MyProject\Modules\Resellers\Reseller|\Illuminate\Database\Eloquent\Model
     */
    public function createReseller()
    {
        return Reseller::create([
            'name'                => request('reseller_name'),
            'is_active'           => 0, //Create as inactive
            'first_name'          => request('first_name'),
            'last_name'           => request('last_name'),
            'contact1_first_name' => request('contact1_first_name'),
            'contact1_last_name'  => request('contact1_last_name'),
            'email'               => request('email'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function createUser()
    {
        return User::create([
            'reseller_id' => $this->reseller->id,
            'first_name'  => request('first_name'),
            'last_name'   => request('last_name'),
            'name'        => request('first_name').' '.request('last_name'),
            'email'       => request('email'),
            'password'    => Hash::make(request('password')),
            'group_ids'   => [(string) self::GROUP_ID],
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
        //event(new Registered($user));
        // Immediately send email verification email
        $user->notifyNow(new ResellerVerifyEmail());

        $adminUser = user(1);
        // If new reseller registered then queue a notification to admin
        if ($user->reseller()->exists()) {
            $adminUser->notifyNow(new ResellerRegistered($user));
        }
    }

}
