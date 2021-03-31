<?php
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

// dd(App\Mainframe\Modules\Users\User::find(1)->email);

// Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);

// Note: This is the default Laravel web routes file. If you are working with
//  mainframe, your project should have a separate dedicated web routes
//  file. Use that one instead

Route::get('test', function () {
    User::find(1); //Test Alias
})->name('test')->middleware(['superuser']);
