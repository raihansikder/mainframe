<?php

use App\Mainframe\Helpers\Mf;

/*
|--------------------------------------------------------------------------
| Project API routes
|--------------------------------------------------------------------------
*/

$modules = Mf::modules();

$version = '1.0'; // Path to create url : root/api/1.0
$namePrefix = 'api.'.$version; // Common name prefix
$middlewares = ['request.json', 'x-auth-token','tenant'];

Route::prefix($version)->middleware($middlewares)->group(function () use ($modules, $namePrefix) {

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
    Route::get('setting/{name}', 'Api\ApiController@getSetting')->name("{$namePrefix}.setting");
    Route::get('data/{block}', 'DataBlockController@show')->name($namePrefix.'.data-block.show');
    Route::get('report/{report}', 'ReportController@show')->name($namePrefix.'.report.show');

    /*-----------------------------------------
    | User API (Requires bearer token)
    |-----------------------------------------*/
    Route::middleware(['bearer-token'])->group(function () use ($modules, $namePrefix) {

        Route::get('/', 'HomeController@index')->middleware(['verified'])->name($namePrefix.'.home');

        // APIs with 'user' prefix
        Route::prefix('user')->group(function () use ($modules, $namePrefix) {

            $namePrefix .= '.user'; // api.1.0.user

            // Section: Profile
            Route::get('/', 'Api\UserApiController@showUser')->name("{$namePrefix}.show");
            Route::patch('/', 'Api\UserApiController@updateUser')->name("{$namePrefix}.update");
            Route::get('profile', 'Api\UserApiController@showUser')->name("{$namePrefix}.profile");

            // Section:  Profile Pic
            Route::post('profile-pic', 'Api\UserApiController@profilePicStore')->name("{$namePrefix}.store.profile-pic");
            Route::delete('profile-pic', 'Api\UserApiController@profilePicDestroy')->name("{$namePrefix}.delete.profile-pic");
        });
    });
});