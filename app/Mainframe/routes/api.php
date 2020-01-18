<?php

use App\Mainframe\Helpers\Mf;

$modules = Mf::modules();
$moduleGroups = Mf::moduleGroups();

/*
|--------------------------------------------------------------------------
| Common routes for all modules
|--------------------------------------------------------------------------
|
| Mainframe modules require following set of routes for common functions
| like showing index page, create/edit form, handle delete etc.
|
*/

Route::prefix('core/1.0')->middleware(['request.json', 'verify.x-auth-token'])->group(function () use ($modules) {

    // Settings api sample
    Route::get('setting/{name}', '\App\Mainframe\Modules\Settings\SettingController@get');
    /*
     * Authentication routes.
     */
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('register', 'Auth\RegisterController@register');

});