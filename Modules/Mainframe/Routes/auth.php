<?php

/*
|--------------------------------------------------------------------------
| Authentication Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register authentication web routes for your application.
|
*/

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('mainframe.login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('mainframe.logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('mainframe.register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('mainframe.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('mainframe.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('mainframe.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('mainframe.password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('mainframe.verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('mainframe.verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('mainframe.verification.resend');
