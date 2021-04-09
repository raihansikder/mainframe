<?php

use App\Mainframe\Helpers\Mf;

/*
|--------------------------------------------------------------------------
| Mainframe API routes
|--------------------------------------------------------------------------
*/
$modules = Mf::modules();

# Path root/api/1.0/core
$version = '1.0';
$namePrefix = 'api.'.$version.'.core';
$middlewares = ['request.json', 'x-auth-token'];

// Note: 'core' is added to the prefix to isolate mainframe native APIs
Route::prefix("core/{$version}")->middleware($middlewares)->group(function () use ($modules, $namePrefix) {

    /*-----------------------------------------
    | Authentication API
    |-----------------------------------------*/
    Route::post('register/{groupName?}', 'Auth\RegisterController@register')->name($namePrefix.".register");
    Route::post('login', 'Auth\LoginController@login')->name($namePrefix.".login");
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name($namePrefix.".reset-password");
    Route::post('logout', 'Auth\LoginController@logout')->name($namePrefix.".logout");

    /*------------------------------------------
    | Module REST API + Helper APIs
    |------------------------------------------*/
    Route::prefix('')->group(function () use ($modules, $namePrefix) {
        foreach ($modules as $module) {

            $path = $module->route_path;
            $controller = $module->controller;
            $moduleName = $module->name;

            Route::get($path.'', $controller.'@listJson')->name($namePrefix.".{$moduleName}.list");
            Route::get($path.'/report', $controller.'@report')->name($namePrefix.".{$moduleName}.report");

            Route::get($path.'/{id}/uploads', $controller.'@uploads')->name($namePrefix.".{$moduleName}.uploads");
            Route::post($path.'/{id}/uploads', $controller.'@attachUpload')->name($namePrefix.".{$moduleName}.attach-upload");

            Route::get($path.'/{id}/comments', $controller.'@comments')->name($namePrefix.".{$moduleName}.comments");
            Route::post($path.'/{id}/comments', $controller.'@attachComments')->name($namePrefix.".{$moduleName}.attach-comment");

            Route::apiResource($path, $controller)->names([
                'index' => "{$namePrefix}.{$moduleName}.index",
                'store' => "{$namePrefix}.{$moduleName}.store",
                'show' => "{$namePrefix}.{$moduleName}.show",
                'update' => "{$namePrefix}.{$moduleName}.update",
                'destroy' => "{$namePrefix}.{$moduleName}.destroy",
            ]);
        }
    });

    /*-----------------------------------------
    | Misc
    |-----------------------------------------*/
    // Setting - Get a setting from key
    Route::get('setting/{name}', 'Api\ApiController@getSetting')->name("{$namePrefix}.setting");
    // DataBlock - Get a data-block from key
    Route::get('data/{block}', 'DataBlockController@show')->name($namePrefix.'.data-block.show');
    Route::get('report/{report}', 'ReportController@show')->name('report');

    /*-----------------------------------------
    | User API (Requires bearer token)
    |-----------------------------------------*/
    Route::middleware(['bearer-token'])->group(function () use ($modules, $namePrefix) {

        // Dashboard data
        Route::get('/', 'HomeController@index')->middleware(['verified'])->name($namePrefix.'.home');

        // APIs with 'use' prefix  (http://root/api/1.0/user/...)
        Route::prefix('user')->group(function () use ($modules, $namePrefix) {

            $namePrefix .= '.user'; // 'api.1.0.user'

            // Section: Profile
            Route::get('/', 'Api\UserApiController@showUser')->name("{$namePrefix}.show");
            Route::patch('/', 'Api\UserApiController@updateUser')->name("{$namePrefix}.update");
            Route::get('profile', 'Api\UserApiController@showUser')->name("{$namePrefix}.profile");

            // Section: Profile-pic
            Route::post('profile-pic', 'Api\UserApiController@profilePicStore')->name("{$namePrefix}.profile-pic.store");
            Route::delete('profile-pic', 'Api\UserApiController@profilePicDestroy')->name("{$namePrefix}.profile-pic.delete");

            // Section: In-app-notifications
            Route::get('in-app-notifications', 'Api\UserApiController@inAppNotifications')->name("{$namePrefix}.in-app-notifications.index");
            Route::patch('in-app-notifications/{id}', 'Api\UserApiController@inAppNotificationUpdate')->name("{$namePrefix}.in-app-notifications.update");
            Route::patch('in-app-notifications/{id}/read', 'Api\UserApiController@inAppNotificationRead')->name("{$namePrefix}.in-app-notifications.read");
            Route::post('in-app-notifications/read-all', 'Api\UserApiController@inAppNotificationsReadAll')
                ->name("{$namePrefix}.in-app-notifications.read-all");
            Route::delete('in-app-notifications/{id}', 'Api\UserApiController@inAppNotificationDelete')->name("{$namePrefix}.in-app-notifications.delete");
            Route::post('in-app-notifications/delete-all', 'Api\UserApiController@inAppNotificationsDeleteAll')
                ->name("{$namePrefix}.in-app-notifications.delete-all");
        });
    });
});