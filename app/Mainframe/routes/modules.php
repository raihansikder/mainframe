<?php

use App\Mainframe\Helpers\Mf;

$modules      = Mf::modules();
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
        $path       = $module->route_path;
        $controller = $module->controller;
        $moduleName = $module->name;

        /* * Restore route */
        Route:: get($path.'/{id}/restore', $controller.'@restore')->name($moduleName.'.restore');

        /* * Json response route for data-table */
        Route:: get($path.'/datatable/json', $controller.'@datatableJson')->name($moduleName.'.datatable-json');

        /* * Generic list return route. This can be used to obtain an array of element. */
        Route:: get($path.'/list/json', $controller.'@listJson')->name($moduleName.'.list-json');

        /* * Default report route */
        Route:: get($path.'/report', $controller.'@report')->name($moduleName.'.report');

        /* * Route to see the change logs of a particular element */
        Route:: get($path.'/{id}/changes', $controller.'@changes')->name($moduleName.'.changes');

        /* * Route to upload file a particular element */
        Route:: get($path.'/{id}/uploads', $controller.'@uploads')->name($moduleName.'.uploads.index');
        Route:: post($path.'/{id}/uploads', $controller.'@attachUpload')->name($moduleName.'.uploads.store');

        /* * Route to add comment file a particular element */
        // Route:: get($path.'/{id}/comments', $controller.'@comments')->name($moduleName.'.comments.index');
        // Route:: post($path.'/{id}/comments', $controller.'@storeComments')->name($moduleName.'.comments.store');

        /* * Resourceful route that creates all REST routs. */
        Route::resource($path, $controller)->names([
            'index'   => "{$module->name}.index",
            'create'  => "{$module->name}.create",
            'store'   => "{$module->name}.store",
            'show'    => "{$module->name}.show",
            'edit'    => "{$module->name}.edit",
            'update'  => "{$module->name}.update",
            'destroy' => "{$module->name}.destroy",
        ]);
    }

    foreach ($moduleGroups as $moduleGroup) {
        $path = $moduleGroup->route_path;
        /*
         * Default module-group routes.
         */
        Route::get('module-groups/index/'.$path, '\App\Mainframe\Modules\ModuleGroups\ModuleGroupController@home')->name($moduleGroup->route_name.'.index');
    }

    /*
    * Update and replace an existing file in an upload.
    */
    Route::post('update-file', '\App\Mainframe\Modules\Uploads\UploadController@updateExistingUpload')->name('uploads.update-file');

    /*
     * Download a file
     */
    Route::get('download/{uuid}', '\App\Mainframe\Modules\Uploads\UploadController@download')->name('download');

});