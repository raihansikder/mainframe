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

Route::prefix('core/1.0')->middleware(['request.json', 'verify.x-auth-token'])->group(function () use ($modules) {

    // List of apis
    Route::get('setting/{name}', '\App\Mainframe\Modules\Settings\SettingController@get');

    // Auth apis
    Route::post('register/{groupName?}', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');

    // Module RESTful apis
    Route::prefix('module')->group(function () use ($modules) {
        foreach ($modules as $module) {
            Route:: get($module->route_path."/list/json", $module->controller."@listJson");
            Route:: get($module->route_path."/report", $module->controller."@report");
            Route::apiResource($module->name, $module->controller)->names([
                'index' => "api.{$module->name}.index",
                'store' => "api.{$module->name}.store",
                'show' => "api.{$module->name}.show",
                'update' => "api.{$module->name}.update",
                'destroy' => "api.{$module->name}.destroy",
            ]);
        }
    });

    // User apis that are called with bearer token.
    Route::prefix('user')->middleware(['verify.bearer-token'])->group(function () {
        Route::get('profile', 'Api\UserApiController@profile');
    });

});