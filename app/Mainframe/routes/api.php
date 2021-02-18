<?php /** @noinspection DuplicatedCode */

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

$version = '1.0';
$middlewares = ['request.json', 'x-auth-token'];
$namePrefix = 'api.'.$version.'.core';

Route::prefix("core/{$version}")->middleware($middlewares)->group(function () use ($modules, $namePrefix) {

    // Auth apis
    Route::post('register/{groupName?}', 'Auth\RegisterController@register')->name($namePrefix.".register");
    Route::post('login', 'Auth\LoginController@login')->name($namePrefix.".login");
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name($namePrefix.".reset-password");
    Route::post('logout', 'Auth\LoginController@logout')->name($namePrefix.".logout");

    // Module RESTful apis
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
                'index'   => "{$namePrefix}.{$moduleName}.index",
                'store'   => "{$namePrefix}.{$moduleName}.store",
                'show'    => "{$namePrefix}.{$moduleName}.show",
                'update'  => "{$namePrefix}.{$moduleName}.update",
                'destroy' => "{$namePrefix}.{$moduleName}.destroy",
            ]);
        }
    });

    // Settings
    Route::get('setting/{name}', 'Api\ApiController@getSetting')->name("{$namePrefix}.setting");

    # APIs that must have bearer token
    Route::middleware(['bearer-token'])->group(function () use ($modules, $namePrefix) {

        # Path root/api/1.0/user
        Route::prefix('user')->group(function () use ($modules, $namePrefix) {

            $namePrefix .= '.user'; // api.1.0.user
            // Profile
            Route::get('/', 'Api\UserApiController@showUser')->name("{$namePrefix}.show");
            Route::patch('/', 'Api\UserApiController@updateUser')->name("{$namePrefix}.update");
            Route::get('profile', 'Api\UserApiController@showUser')->name("{$namePrefix}.profile");
            Route::post('profile-pic/store', 'Api\UserApiController@profilePicStore')->name("{$namePrefix}.store.profile-pic");
            Route::delete('profile-pic/delete', 'Api\UserApiController@profilePicDestroy')->name("{$namePrefix}.delete.profile-pic");
        });
    });
});