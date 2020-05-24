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

Route::prefix('core/1.0')->middleware(['request.json', 'x-auth-token'])->group(function () use ($modules) {

    // Auth apis
    Route::post('register/{groupName?}', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('logout', 'Auth\LoginController@logout');

    // User apis that are called with bearer token.
    Route::prefix('user')->middleware(['bearer-token'])->group(function () {
        Route::patch('/', 'Api\UserApiController@update');
        Route::get('profile', 'Api\UserApiController@profile');
        Route::post('profile-pic/store', 'Api\UserApiController@profilePicStore');
        Route::delete('profile-pic/delete', 'Api\UserApiController@profilePicDestroy');
    });

    // Settings
    Route::get('setting/{name}', 'Api\ApiController@getSetting');

    // Module RESTful apis
    Route::prefix('module')->group(function () use ($modules) {
        foreach ($modules as $module) {

            $path       = $module->route_path;
            $controller = $module->controller;
            $moduleName = $module->name;

            Route::get($path.'/list/json', $controller.'@listJson');
            Route::get($path.'/report', $controller.'@report');

            Route::get($path.'/{id}/uploads', $controller.'@uploads');
            Route::post($path.'/{id}/uploads', $controller.'@attachUpload');

            Route::get($path.'/{id}/comments', $controller.'@comments');
            Route::post($path.'/{id}/comments', $controller.'@attachComments');

            Route::apiResource($path, $controller)->names([
                'index'   => "core.api.{$moduleName}.index",
                'store'   => "core.api.{$moduleName}.store",
                'show'    => "core.api.{$moduleName}.show",
                'update'  => "core.api.{$moduleName}.update",
                'destroy' => "core.api.{$moduleName}.destroy",
            ]);
        }
    });
});