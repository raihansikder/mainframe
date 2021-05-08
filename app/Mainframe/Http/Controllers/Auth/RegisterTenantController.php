<?php /** @noinspection ALL */

namespace App\Mainframe\Http\Controllers\Auth;

use App\Group;
use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterTenantController extends RegisterController
{

    /** @var Tenant */
    public $tenant;

    /** @var string */
    protected $form = 'mainframe.auth.register-tenant';

    /**
     * If not group is specified then user will be registered to this default group;
     *
     * @var string
     */
    protected $defaultGroupName = 'tenant-admin';

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

        $this->redirectTo = route('login');
        if (!$this->user) { // Redirect to register page if failed
            $this->redirectTo = route('register.tenant');
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
            'tenant_name' => 'required|unique:tenants,name',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => User::PASSWORD_VALIDATION_RULE,
        ]);

        if ($validator->fails()) {
            $this->setValidator($validator);

            return $this;
        }

        // Validation success. Now create tenant
        $this->tenant = $this->createTenant();
        if (!$this->tenant) {
            $this->fail('Tenant creation failed');

            return $this;
        }

        // Create user
        $this->user = $this->createUser();
        if (!$this->user) {
            $this->fail('User creation failed');
            Tenant::where('id', $this->tenant->id)->forceDelete();

            return $this;
        }

        $this->success('Verify your email and log in.');
        $this->registered(request(), $this->user);

        // $this->user->update(['tenant_id' => $this->tenant->id]);

        return $this;

    }

    /**
     * Create a tenant
     *
     * @return \App\Tenant
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
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name').' '.request('last_name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'group_ids' => [(string) Group::tenantAdmin()->id],
            'is_active' => 1,
            'tenant_id' => $this->tenant->id,
            'gender'=>'Male',
        ]);
    }

}
