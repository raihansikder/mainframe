<?php

/*
|--------------------------------------------------------------------------
| Mainframe web routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('data/{block}', 'DataBlockController@show')->name('data-block.show');
    Route::get('report/{report}', 'ReportController@show')->name('report');
});
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

