<?php

namespace App\Mainframe\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';
    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Mainframe\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        /*****************************************
         * Additional routes for Mainframe
         ****************************************/
        // Default auth routes
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Mainframe/routes/auth.php'));

        // Mainframe auth routes
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Mainframe/routes/auth-mainframe.php'));

        // Module
        Route::middleware('web')
            ->namespace('App\Mainframe\Modules')
            ->group(base_path('app/Mainframe/routes/mainframe.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {

        /*************************************
         * Additional routes for Mainframe
         ************************************/
        // Default auth routes
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Mainframe/routes/api.php'));
    }
}
