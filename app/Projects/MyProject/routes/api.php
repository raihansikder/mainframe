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
    // set a prefix if you want for all the generic module routes.
    Route::prefix('')->group(function () use ($modules) {

        # Path root/api/1.0/module
        foreach ($modules as $module) {
            Route::get($module->route_path."/list/json", $module->controller."@listJson");
            Route::get($module->route_path."/report", $module->controller."@report");

            Route::get($module->route_path."/{id}/uploads", $module->controller."@uploads");
            Route::post($module->route_path."/{id}/uploads", $module->controller."@attachUpload");

            Route::get($module->route_path."/{id}/comments", $module->controller."@comments");
            Route::post($module->route_path."/{id}/comments", $module->controller."@storeComments");

            Route::apiResource($module->name, $module->controller)->names([
                'index'   => "api.{$module->name}.index",
                'store'   => "api.{$module->name}.store",
                'show'    => "api.{$module->name}.show",
                'update'  => "api.{$module->name}.update",
                'destroy' => "api.{$module->name}.destroy",
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