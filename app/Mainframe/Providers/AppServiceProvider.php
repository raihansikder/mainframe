<?php /** @noinspection PhpIncludeInspection */

namespace App\Mainframe\Providers;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use App\Mainframe\Features\Responder\Response;

class AppServiceProvider extends ServiceProvider
{
    protected $commands = [
        \App\Mainframe\Commands\MakeMainframeModule::Class,
    ];

    protected $providers = [
        \App\Mainframe\Providers\AuthServiceProvider::class,
        \App\Mainframe\Providers\EventServiceProvider::class,
        \App\Mainframe\Providers\RouteServiceProvider::class,
        \OwenIt\Auditing\AuditingServiceProvider::class
    ];

    protected $helpers = [
        'Mainframe/Helpers/functions.php',
        'Mainframe/Helpers/generic.php',
    ];

    /**
     * Register services, helpers etc.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();
        $this->registerProviders();
        $this->registerCommands();
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

        /*
         * Include all php files in a directory.
         */
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

        $this->app->singleton(MessageBag::class, function () { return new MessageBag(); });
        $this->app->singleton(Response::class, function () { return new Response(); });
    }

}
