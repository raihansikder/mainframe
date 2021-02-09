<?php

use App\Mainframe\Helpers\Mf;

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
|
| Mainframe modules require following set of routes for common functions
| like showing index page, create/edit form, handle delete etc.
|
*/

$modules = Mf::modules();

# Path root/api/1.0
Route::prefix('1.0')->middleware(['request.json', 'x-auth-token'])->group(function () use ($modules) {

    // Auth apis
    Route::post('register/{groupName?}', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('logout', 'Auth\LoginController@logout');

    // Settings
    Route::get('setting/{name}', 'Api\ApiController@getSetting');

    // Module RESTful apis
    Route::prefix('')->group(function () use ($modules) {
        foreach ($modules as $module) {

            $path = $module->route_path;
            $controller = $module->controller;
            $moduleName = $module->name;

            Route::get($path.'/list/json', $controller.'@listJson');
            Route::get($path.'/report', $controller.'@report');

            Route::get($path.'/{id}/uploads', $controller.'@uploads');
            Route::post($path.'/{id}/uploads', $controller.'@attachUpload');

            Route::get($path.'/{id}/comments', $controller.'@comments');
            Route::post($path.'/{id}/comments', $controller.'@attachComments');

            Route::apiResource($path, $controller)->names([
                'index' => "api.{$moduleName}.index",
                'store' => "api.{$moduleName}.store",
                'show' => "api.{$moduleName}.show",
                'update' => "api.{$moduleName}.update",
                'destroy' => "api.{$moduleName}.destroy",
            ]);
        }
    });

    # APIs that must have bearer token
    Route::middleware(['bearer-token'])->group(function () {

        # Path root/api/1.0/user
        Route::prefix('user')->group(function () {
            // Profile
            Route::get('/', 'Api\UserApiController@showUser');
            Route::patch('/', 'Api\UserApiController@updateUser');
            Route::post('profile-pic/store', 'Api\UserApiController@profilePicStore');
        });
    });

});