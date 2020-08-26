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

Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    // Write project specific routes
});

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
|
*/


