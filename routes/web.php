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


/**
 * Mainframe routes
 */

include_once app_path("Mainframe/routes/auth.php");
include_once app_path("Mainframe/routes/auth-mainframe.php");
include_once app_path("Mainframe/routes/modules.php");

// Auth::routes();
Route::get('/test', '\App\Mainframe\Http\Controller\TestController@test')->name('test')->middleware(['verified', 'password.confirm']);
