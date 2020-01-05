<?php

namespace App\Providers;

use Gate;
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
        //'App\Mainframe\Modules\Settings\Setting' => 'App\Mainframe\Modules\Settings\SettingPolicy',

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
            return PolicyResolver::resolve($modelClass); // Custom policy discovery
        });
    }
}
