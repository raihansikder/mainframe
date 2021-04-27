<?php

/*
|--------------------------------------------------------------------------
| Mainframe web routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('data/{key}', 'DataBlockController@show')->name('data-block.show');
    Route::get('report/{key}', 'ReportController@show')->name('report');
    Route::get('datatable/{key}', 'DatatableController@show')->name('datatable.json');
});
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

