<?php /** @noinspection PhpIncludeInspection */

namespace App\Projects\MyProject\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * List of commands
     *
     * @var array
     */
    protected $commands = [
        \App\Projects\MyProject\Commands\DoSomething::Class,

    ];

    /**
     * List of Service provider
     *
     * @var array
     */
    protected $providers = [
        \App\Projects\MyProject\Providers\AuthServiceProvider::class,
        \App\Projects\MyProject\Providers\EventServiceProvider::class,
        \App\Projects\MyProject\Providers\RouteServiceProvider::class,
    ];

    /**
     * List of helper files to be included
     *
     * @var array
     */
    protected $helpers = [
        'Projects/MyProject/Helpers/functions.php',
    ];

    /**
     * Register services, helpers etc.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProviders();
        $this->registerCommands();
        $this->registerHelpers();
        $this->registerSingletons();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register commands
     */
    public function registerCommands()
    {
        $this->commands($this->commands);
    }

    /**
     * Include helpers
     */
    public function registerHelpers()
    {
        foreach ($this->helpers as $helper) {
            require_once app_path($helper);
        }

        // Include all php files in a directory.
        // foreach (glob(app_path('Helpers').'/*.php') as $file) {
        //     require_once $file;
        // }
    }

    /**
     * Register providers.
     */
    public function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }

    }

    /**
     * Register singletons
     */
    public function registerSingletons()
    {

    }

}
