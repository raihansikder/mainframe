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

    // Settings api sample
    Route::get('setting/{name}', '\App\Mainframe\Modules\Settings\SettingController@get');

    // Auth routes
    Route::post('register/{groupName?}', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::prefix('user')->middleware(['verify.bearer-token'])->group(function () {

        // Settings api sample
        Route::get('test', 'Api\UserApiController@test');

    });

});