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

    // dd(\App\Content::byKey('sample-content')->part('title'));
    //
    // dd(content('sample-content','footer'));
    // $contents = (new SampleContent());
    // dd($contents->get('footer'));
    //
    // dd(\App\Upload::find(4)->uploadable); //Test Alias

    // $user = \App\Projects\MyProject\Modules\Users\User::find(999);
    // $user->uploads()->create([
    //     'module_id' => 4,
    //     'path' => '/files/w9FWgtaR_istockphoto-1070106162-612x612.jpg',
    // ]);

    \App\Projects\MyProject\Modules\Uploads\Upload::find(18)->update([
        'module_id' => 4,
        'path' => 'Update'.randomString(),
    ]);

})->name('test')->middleware(['superuser']);