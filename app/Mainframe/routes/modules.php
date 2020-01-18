<?php

use App\Mainframe\Helpers\Mf;

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

Route::middleware(['auth', 'verified'])->group(function () use ($modules, $moduleGroups) {
    foreach ($modules as $module) {
        $path = $module->route_path;
        $controller = $module->controller;
        $moduleName = $module->name;

        /* * Restore route */
        Route:: get($path."/{id}/restore", $controller."@restore")->name($moduleName.'.restore');

        /* * Json response route for data-table */
        Route:: get($path."/datatable/json", $controller."@datatableJson")->name($moduleName.'.datatable-json');

        /* * Generic list return route. This can be used to obtain an array of element. */
        Route:: get($path."/list/json", $controller."@listJson")->name($moduleName.'.list-json');

        /* * Default report route */
        Route:: get($path."/report", $controller."@report")->name($moduleName.'.report');

        /* * Route to see the change logs of a particular element */
        Route:: get($path."/{id}/changes", $controller."@changes")->name($moduleName.'.changes');

        /* * Resourceful route that creates all REST routs. */
        Route::resource($moduleName, $controller);
    }

    foreach ($moduleGroups as $moduleGroup) {
        $path = $moduleGroup->route_path;
        /*
         * Default module-group routes.
         */
        Route::get('module-groups/index/'.$path, 'ModuleGroups\ModuleGroupController@groupIndex')->name($moduleGroup->route_name.'.index');
    }

    /*
    * Update and replace an existing file in an upload.
    */
    Route::post('update-file', 'Modules\Uploads\UploadController@updateExistingUpload')->name('uploads.update-file');

    /*
     * Download a file
     */
    Route::get('download/{uuid}', 'Modules\Uploads\UploadController@download')->name('download');

});