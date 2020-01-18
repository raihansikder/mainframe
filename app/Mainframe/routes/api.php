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

    // Settings api sampel
    Route::get('setting/{name}', ['as' => 'api.get.setting', 'uses' => '\App\Mainframe\Modules\Settings\SettingController@getSetting']);

});