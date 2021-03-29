<?php /** @noinspection DuplicatedCode */

use App\Mainframe\Helpers\Mf;

$modules = Mf::modules();
$moduleGroups = Mf::moduleGroups();
/*
|--------------------------------------------------------------------------
| Project web routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () use ($modules, $moduleGroups) {

    Route::get('/', 'HomeController@index')->name('home');

    // Note : Find the full list in app/Mainframe/routes/modules.php
    /*---------------------------------
    | Common Mainframe module route map
    |---------------------------------*/
    foreach ($modules as $module) {
        $path = $module->route_path;
        $controller = $module->controller;
        $moduleName = $module->name;

        Route::get($path.'/{id}/restore', $controller.'@restore')->name($moduleName.'.restore'); // Restore
        Route::get($path.'/datatable/json', $controller.'@datatableJson')->name($moduleName.'.datatable-json'); // Json response route for data-table
        Route::get($path.'/list/json', $controller.'@listJson')->name($moduleName.'.list-json'); // List/Array of objects
        Route::get($path.'/report', $controller.'@report')->name($moduleName.'.report'); // Report
        Route::get($path.'/{id}/changes', $controller.'@changes')->name($moduleName.'.changes'); // Audits (change-log)
        Route::get($path.'/{id}/uploads', $controller.'@uploads')->name($moduleName.'.uploads.index'); // Uploads
        Route::post($path.'/{id}/uploads', $controller.'@attachUpload')->name($moduleName.'.uploads.store');

        /* * Route to add comment file a particular element */
        // Route::get($path.'/{id}/comments', $controller.'@comments')->name($moduleName.'.comments.index');
        // Route::post($path.'/{id}/comments', $controller.'@storeComments')->name($moduleName.'.comments.store');

        /* * Resourceful route that creates all REST routs. */
        Route::resource($path, $controller)->names([
            'index' => "{$module->name}.index",
            'create' => "{$module->name}.create",
            'store' => "{$module->name}.store",
            'show' => "{$module->name}.show",
            'edit' => "{$module->name}.edit",
            'update' => "{$module->name}.update",
            'destroy' => "{$module->name}.destroy",
        ]);
    }
    // Module-group index routes
    foreach ($moduleGroups as $moduleGroup) {
        $path = $moduleGroup->route_path;
        Route::get('module-groups/index/'.$path, '\App\Mainframe\Modules\ModuleGroups\ModuleGroupController@home')->name($moduleGroup->route_name.'.index');
    }

    Route::post('update-file', '\App\Mainframe\Modules\Uploads\UploadController@updateExistingUpload')->name('uploads.update-file'); // Update uploaded file
    Route::get('download/{uuid}', '\App\Mainframe\Modules\Uploads\UploadController@download')->name('download'); // Download
    Route::get('data/{block}', 'DataBlockController@show')->name('data-block.show'); // Data-block
    Route::get('report/{report}', 'ReportController@show')->name('report.show');

    /*---------------------------------
    | Project specific routs
    |---------------------------------*/
    // Todo : Write new routes for your project
});

/*---------------------------------
| Public routes
|---------------------------------*/
// Todo : Write any public routes for your project
