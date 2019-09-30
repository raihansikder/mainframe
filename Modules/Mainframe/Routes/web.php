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
$prefix = config('mainframe.route_prefix') ?? 'mainframe';

Route::prefix($prefix)->group(function () {
    /**
     * Auth routes
     ***********************************/
    // Auth::routes(['verify' => true]);
    include_once 'auth.php';

    /**
     * Default
     ***********************************/
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('mainframe.mainframe.home');
});
