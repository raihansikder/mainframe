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

// Auth::routes(['verify' => true]);

include_once "../App/Mainframe/routes/auth.php";
include_once "../App/Mainframe/routes/module.php";




