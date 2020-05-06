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
            Route::get($module->route_path.'/list/json', $module->controller.'@listJson');
            Route::get($module->route_path.'/report', $module->controller.'@report');

            Route::get($module->route_path.'/{id}/uploads', $module->controller.'@uploads');
            Route::post($module->route_path.'/{id}/uploads', $module->controller.'@attachUpload');

            Route::get($module->route_path.'/{id}/comments', $module->controller.'@comments');
            Route::post($module->route_path.'/{id}/comments', $module->controller.'@attachComments');

            Route::apiResource($module->name, $module->controller)->names([
                'index' => "core.api.{$module->name}.index",
                'store' => "core.api.{$module->name}.store",
                'show' => "core.api.{$module->name}.show",
                'update' => "core.api.{$module->name}.update",
                'destroy' => "core.api.{$module->name}.destroy",
            ]);
        }
    });
});