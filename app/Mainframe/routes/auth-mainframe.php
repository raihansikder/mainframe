<?php
/*
|--------------------------------------------------------------------------
| Mainframe Auth routes
|--------------------------------------------------------------------------
|
| These routes are manually added instead of calling Auth::routes();
| This gives much flexibility to write these routes as necessary
| for the architectural implementation
|
*/

Route::prefix('mf/auth')->group(function () {

    $namePrefix = 'mf.'; // Route name prefix
    $controllerRoot = '\App\Mainframe\Http\Controllers\\';

    Route::get('login', $controllerRoot.'Auth\LoginController@showLoginForm')->name($namePrefix.'login');
    Route::post('login', $controllerRoot.'Auth\LoginController@login');
    Route::post('logout', $controllerRoot.'Auth\LoginController@logout')->name($namePrefix.'logout');

    // Registration Routes...
    Route::get('register', $controllerRoot.'Auth\RegisterController@showRegistrationForm')->name($namePrefix.'register');
    Route::post('register', $controllerRoot.'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', $controllerRoot.'Auth\ForgotPasswordController@showLinkRequestForm')->name($namePrefix.'password.request');
    Route::post('password/email', $controllerRoot.'Auth\ForgotPasswordController@sendResetLinkEmail')->name($namePrefix.'password.email');
    Route::get('password/reset/{token}', $controllerRoot.'Auth\ResetPasswordController@showResetForm')->name($namePrefix.'password.reset');
    Route::post('password/reset', $controllerRoot.'Auth\ResetPasswordController@reset')->name($namePrefix.'password.update');

    // Password Confirmation Routes...
    Route::get('password/confirm', $controllerRoot.'Auth\ConfirmPasswordController@showConfirmForm')->name($namePrefix.'password.confirm');
    Route::post('password/confirm', $controllerRoot.'Auth\ConfirmPasswordController@confirm');

    // Email Verification Routes...
    Route::get('email/verify', $controllerRoot.'Auth\VerificationController@show')->name($namePrefix.'verification.notice');
    Route::get('email/verify/{id}/{hash}', $controllerRoot.'Auth\VerificationController@verify')->name($namePrefix.'verification.verify');
    Route::post('email/resend', $controllerRoot.'Auth\VerificationController@resend')->name($namePrefix.'verification.resend');

    /*
    |--------------------------------------------------------------------------
    | Mainframe Tenant Registration routes
    |--------------------------------------------------------------------------
    |
    */

    // Tenant Registration Routes...
    Route::get('register/tenant', $controllerRoot.'Auth\RegisterTenantController@showRegistrationForm')->name($namePrefix.'tenant.register');
    Route::post('register/tenant', $controllerRoot.'Auth\RegisterTenantController@register');

    // Log out
    Route::get('logout', $controllerRoot.'Auth\LoginController@logout')->name($namePrefix.'get.logout');
});