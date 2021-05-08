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

   // return cached('logged-user-group-name');
    $storage = \Cache::getStore(); // will return instance of FileStore
    $filesystem = $storage->getFilesystem(); // will return instance of Filesystem
    $dir = (\Cache::getDirectory());
    $keys = [];
    foreach ($filesystem->allFiles($dir) as $file1) {

        if (is_dir($file1->getPath())) {

            foreach ($filesystem->allFiles($file1->getPath()) as $file2) {
                $keys = array_merge($keys, [$file2->getRealpath() => unserialize(substr(\File::get($file2->getRealpath()), 10))]);
            }
        }
        else {

        }
    }
    printArray($keys);
   return Cached::value('logged-user-group-name');

})->name('test');