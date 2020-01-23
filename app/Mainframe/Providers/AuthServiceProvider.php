<?php

namespace App\Mainframe\Providers;

use Gate;
use Auth;
use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Resolvers\PolicyResolver;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return PolicyResolver::resolve($modelClass); // Custom policy discovery
        });

        $this->registerGates();
        $this->registerGuards();



    }

    /**
     * Register gates that are not related to any model.
     */
    public function registerGates()
    {

        $this->gateCustomPermissions(); // from config mainframe.permissions.custom

        // Gate::define('permission-key', function (User $user) {
        //     return $user->hasPermission('permission-key');
        // });

    }

    /**
     * Based on permission keys set in config/mainframe/permissions.php
     * custom gates are auto defined.
     */
    public function gateCustomPermissions()
    {
        $customPermissions = config('mainframe.permissions.custom');

        foreach ($customPermissions as $category => $permissions) {
            foreach ($permissions as $key => $label) {
                Gate::define($key, function (User $user) use ($key) {
                    return $user->hasPermission($key);
                });
            }
        }
    }

    public function registerGuards()
    {
        /**
         * Drive x-auth
         */
        Auth::viaRequest('x-auth', function (\Illuminate\Http\Request $request) {

            return User::apiAuthenticator();

        });

        /**
         * Drive bearer
         */
        Auth::viaRequest('bearer', function (\Illuminate\Http\Request $request) {

            return User::bearer();

        });
    }
}
