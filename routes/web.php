<?php
/** @noinspection PhpIncludeInspection */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);

// Auth::routes();
Route::get('test', '\App\Mainframe\Http\Controller\TestController@test')->name('test')->middleware(['verified', 'password.confirm']);

Route::get('mail', function () {
    $user = \App\Mainframe\Modules\Users\User::find(2625);

    return (new \App\Mainframe\Notifications\Auth\ResetPassword())
        ->toMail($user);
});