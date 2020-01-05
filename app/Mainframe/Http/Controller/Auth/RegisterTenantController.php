<?php

namespace App\Mainframe\Http\Controllers\Auth;

use Validator;
use Illuminate\Http\Request;
use App\Mainframe\Helpers\Mf;
use Illuminate\Support\Facades\Hash;
use App\Mainframe\Modules\Users\User;
use App\Mainframe\Modules\Tenants\Tenant;

class RegisterTenantController extends RegisterController
{

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register-tenant');
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

        $this->response()->redirectTo = $this->redirectTo();

        if ($this->response()->expectsJson()) {
            return $this->response()->load()->json();
        }

        return $this->response()->redirect();

    }

    public function attemptRegistration()
    {
        $validator = Validator::make(request()->all(), [
            'tenant_name' => 'required|unique:tenants,name',
            'user_first_name' => 'required',
            'user_last_name' => 'required',
            'user_email' => 'required|email|unique:users,email',
            'password' => Mf::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->response($validator)->failValidation();

            return $this;
        }

        /**
         * Validation success.
         */
        $tenant = $this->createTenant();
        $user = $this->createUser();

    }

    /**
     * Create a tenant
     *
     * @return \App\Mainframe\Modules\Tenants\Tenant
     */
    public function createTenant()
    {
        return Tenant::create([
            'name' => request('tenant_name'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Mainframe\Modules\Users\User
     */
    protected function createUser()
    {
        return User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name').' '.request('last_name'),
            'email' => request('user_email'),
            'password' => Hash::make(request('password')),
            'group_ids' => [Mf::TENANT_ADMIN_GROUP_ID],
        ]);
    }

}
