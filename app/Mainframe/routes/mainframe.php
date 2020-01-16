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
        $name = $module->name;

        /*
         * Restore route
         */
        Route:: get($path."/{id}/restore", $controller."@restore")->name($name.'.restore');

        /*
         * Json response route for data-table
         */
        Route:: get($path."/datatable/json", $controller."@datatableJson")->name($name.'.datatable-json');

        /*
         * Generic list return route. This can be used to obtain an array of element.
         */
        Route:: get($path."/list/json", $controller."@listJson")->name($name.'.list-json');

        /*
         * Default report route
         */
        Route:: get($path."/report", $controller."@report")->name($name.'.report');

        /*
         * Route to see the change logs of a particular element
         */
        Route:: get($path."/{id}/changes", $controller."@changes")->name($name.'.changes');

        /*
         * Resourceful route that creates all REST routs.
         */
        Route::resource($name, $controller);
    }

    foreach ($moduleGroups as $moduleGroup) {
        /*
         * Default module-group routes.
         */
        Route::get($moduleGroup->name, '\App\Mainframe\Modules\ModuleGroups\ModuleGroupController@modulegroupIndex')->name($moduleGroup->name.'.index');
    }

    /*
    * Update and replace an existing file in an upload.
    */
    Route::post('update-file', '\App\Mainframe\Modules\Uploads\UploadController@updateExistingUpload')->name('uploads.update-file');

    /*
     * Download a file
     */
    Route::get('download/{uuid}', '\App\Mainframe\Modules\Uploads\UploadController@download')->name('get.download');

});