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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

// include_once('mainframe/modules.php'); // Later when we move routes to a different directory

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

use App\Module;
use App\ModuleGroup;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home')->middleware(['verified']);

/*
 *
 * Isotone Resources / RESTful routes.
 * ***************************************************************************
 * Resources automatically generates index, create, store, show, edit, update,
 * destroy routes. Based on the modules table all these routes are created.
 * In addition to above we also need a 'restore' as we have soft delete
 * enabled for our solution.
 *
 * prefix    :
 * filter    : before [auth] - only authenticated users can access these routes
 *        : before [resource.route.permission.check] - checks permission using Sentry.
 *****************************************************************************/
$modules      = dbTableExists('modules') ? Module::all() : []; // dbTableExists() was causing issue.
$moduleGroups = dbTableExists('module_groups') ? ModuleGroup::all() : [];

Route::middleware(['auth'])->group(function () use ($modules, $moduleGroups) {

    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
    # default routes for all modules
    foreach ($modules as $module) {
        $controller = $module->controller;
        $moduleName = $module->name;
        Route:: get($moduleName."/{".Str::singular($module->name)."}/restore", $controller."@restore")->name($moduleName.'.restore');
        Route:: get($moduleName."/grid", $controller."@grid")->name($moduleName.'.grid');
        Route:: get($moduleName."/list/json", $controller."@list")->name($moduleName.'.list-json');
        Route:: get($moduleName."/report", $controller."@report")->name($moduleName.'.report');
        Route:: get($moduleName."/{".Str::singular($module->name)."}/changes", $controller."@changes")->name($moduleName.'.changes');
        Route::resource($module->name, $controller);
    }

    foreach ($moduleGroups as $moduleGroup) {
        Route::get($moduleGroup->name, 'ModuleGroupsController@modulegroupIndex')->name($moduleGroup->name.'.index');
    }

    # route for updating an existing upload file
    Route::post('update_upload', 'UploadsController@updateExistingUpload')->name('uploads.update_last_upload');
    /**
     * Generate download request of a file.
     * Files are stored in a physical file system. To hide the urls from the user following URL generates a download
     * request that initiates download of the file matching the uuid.
     */
    Route::get('download/{uuid}', 'UploadsController@download')->name('get.download');

});


