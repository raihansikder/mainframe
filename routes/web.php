<?php

use App\Mainframe\Helpers\Mf;
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

Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);
/*
 *****************************************************************************/

Route::middleware(['auth'])->group(function () {
    Mf::webRoutes();
    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
});


