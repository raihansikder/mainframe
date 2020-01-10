<?php

namespace App\Mainframe\Providers;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use App\Mainframe\Features\Responder\Response;

class MainframeServiceProvider extends ServiceProvider
{
    protected $commands = [
        \App\Mainframe\Commands\MakeMainframeModule::Class,
    ];

    protected $helpers = [
        'Mainframe/Helpers/functions.php',
        'Mainframe/Helpers/generic.php',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        // Include all the helper functions
        require_once app_path('Mainframe/Helpers/functions.php');
        require_once app_path('Mainframe/Helpers/generic.php');
        foreach (glob(app_path('Helpers').'/*.php') as $file) {
            require_once $file;
        }

        // Register singletons
        $this->app->singleton(MessageBag::class, function () { return new MessageBag(); });
        $this->app->singleton(Response::class, function () { return new Response(); });
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

    public function registerCommands()
    {
        // Include commands
        $this->commands($this->commands);
    }

}
