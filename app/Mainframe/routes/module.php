<?php

use App\Mainframe\Features\Mf;

$modules = Mf::modules();
$moduleGroups = Mf::moduleGroups();

/*
|--------------------------------------------------------------------------
| Common routes for all modules
|--------------------------------------------------------------------------
|
| Mainframe modules require following set of routes for common functions
| like showing index page, create/edit form, handle delete etc.
|
*/

Route::middleware(['auth'])->group(function () use ($modules, $moduleGroups) {
    foreach ($modules as $module) {
        $controller = $module->controller;
        $moduleName = $module->name;

        /*
         * Restore route
         */
        Route:: get($moduleName."/{".Str::singular($moduleName)."}/restore", $controller."@restore")->name($moduleName.'.restore');

        /*
         * Json response route for data-table
         */
        Route:: get($moduleName."/datatable/json", $controller."@datatableJson")->name($moduleName.'.datatable-json');

        /*
         * Generic list return route. This can be used to obtain an array of element.
         */
        Route:: get($moduleName."/list/json", $controller."@listJson")->name($moduleName.'.list-json');

        /*
         * Default report route
         */
        Route:: get($moduleName."/report", $controller."@report")->name($moduleName.'.report');

        /*
         * Route to see the change logs of a particular element
         */
        Route:: get($moduleName."/{".Str::singular($moduleName)."}/changes", $controller."@changes")->name($moduleName.'.changes');

        /*
         * Resourceful route that creates all REST routs.
         */
        Route::resource($moduleName, $controller);
    }

    foreach ($moduleGroups as $moduleGroup) {
        /*
         * Default module-group routes.
         */
        Route::get($moduleGroup->name, 'ModuleGroupsController@modulegroupIndex')->name($moduleGroup->name.'.index');
    }

    /*
    * Update and replace an existing file in an upload.
    */
    Route::post('update_upload', 'UploadsController@updateExistingUpload')->name('uploads.update_last_upload');

    /*
     * Download a file
     */
    Route::get('download/{uuid}', 'UploadsController@download')->name('get.download');

    /*
     * Log out
     */
    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
});