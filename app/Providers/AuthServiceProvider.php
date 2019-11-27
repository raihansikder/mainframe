<?php

namespace App\Providers;

use Gate;
use App\Mainframe\Features\Mf;
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

        //

        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return Mf::resolvePolicy($modelClass); // Custom policy discovery
        });
    }
}
