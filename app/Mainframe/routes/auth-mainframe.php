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

    $mfPrefix = 'mf.'; // Route name prefix
    $path = '\App\Mainframe\Http\Controllers\\';

    Route::get('login', $path.'Auth\LoginController@showLoginForm')->name($mfPrefix.'login');
    Route::post('login', $path.'Auth\LoginController@login');
    Route::post('logout', $path.'Auth\LoginController@logout')->name($mfPrefix.'logout');

    // Registration Routes...
    Route::get('register', $path.'Auth\RegisterController@showRegistrationForm')->name($mfPrefix.'register');
    Route::post('register', $path.'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', $path.'Auth\ForgotPasswordController@showLinkRequestForm')->name($mfPrefix.'password.request');
    Route::post('password/email', $path.'Auth\ForgotPasswordController@sendResetLinkEmail')->name($mfPrefix.'password.email');
    Route::get('password/reset/{token}', $path.'Auth\ResetPasswordController@showResetForm')->name($mfPrefix.'password.reset');
    Route::post('password/reset', $path.'Auth\ResetPasswordController@reset')->name($mfPrefix.'password.update');

    // Password Confirmation Routes...
    Route::get('password/confirm', $path.'Auth\ConfirmPasswordController@showConfirmForm')->name($mfPrefix.'password.confirm');
    Route::post('password/confirm', $path.'Auth\ConfirmPasswordController@confirm');

    // Email Verification Routes...
    Route::get('email/verify', $path.'Auth\VerificationController@show')->name($mfPrefix.'verification.notice');
    Route::get('email/verify/{id}/{hash}', $path.'Auth\VerificationController@verify')->name($mfPrefix.'verification.verify');
    Route::post('email/resend', $path.'Auth\VerificationController@resend')->name($mfPrefix.'verification.resend');

    /*
    |--------------------------------------------------------------------------
    | Mainframe Tenant Registration routes
    |--------------------------------------------------------------------------
    |
    */

    // Tenant Registration Routes...
    Route::get('register/tenant', $path.'Auth\RegisterTenantController@showRegistrationForm')->name($mfPrefix.'tenant.register');
    Route::post('register/tenant', $path.'Auth\RegisterTenantController@register');

});