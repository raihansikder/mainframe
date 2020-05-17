<?php /** @noinspection ALL */

namespace App\Mainframe\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mainframe\Modules\Tenants\Tenant;

class RegisterTenantController extends RegisterController
{

    /** @var Tenant */
    public $tenant;
    /** @var User */
    public $user;

    /** @var string */
    protected $form = 'mainframe.auth.register-tenant';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view($this->form);
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
        $this->response()->redirectTo = $this->resolveRedirectTo();

        if ($this->expectsJson()) {
            return $this->load()->json();
        }

        return $this->redirect();

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
            'tenant_name' => 'required|unique:tenants,name',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->response()->setValidator($validator)->failValidation();

            return $this;
        }

        // Validation success. Now create tenant
        $this->tenant = $this->createTenant();
        if (! $this->tenant) {
            $this->fail('Tenant creation failed');

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (! $this->user) {
            $this->fail('User creation failed');
            Tenant::where('id', $this->tenant->id)->forceDelete();

            return $this;
        }

        $this->success('Verify your email and log in.');
        $this->registered(request(), $this->user);

        return $this;

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
     * @return \App\User
     */
    protected function createUser()
    {
        return User::create([
            'tenant_id' => $this->tenant->id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name').' '.request('last_name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'group_ids' => [(string) Group::tenantAdmin()->id],
        ]);
    }

}
