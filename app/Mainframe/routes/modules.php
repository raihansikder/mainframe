<?php /** @noinspection DuplicatedCode */

use App\Mainframe\Helpers\Mf;

$modules = Mf::modules();
$moduleGroups = Mf::moduleGroups();
/*
|--------------------------------------------------------------------------
| Common routes for all modules
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'tenant'])->group(function () use ($modules, $moduleGroups) {

    foreach ($modules as $module) {
        $path = $module->route_path;
        $controller = $module->controller;
        $moduleName = $module->name;

        Route::get($path.'/{id}/restore', $controller.'@restore')->name($moduleName.'.restore');
        Route::get($path.'/datatable/json', $controller.'@datatableJson')->name($moduleName.'.datatable-json');
        Route::get($path.'/list/json', $controller.'@listJson')->name($moduleName.'.list-json');
        Route::get($path.'/report', $controller.'@report')->name($moduleName.'.report');
        Route::get($path.'/{id}/changes', $controller.'@changes')->name($moduleName.'.changes');
        Route::get($path.'/{id}/uploads', $controller.'@uploads')->name($moduleName.'.uploads.index');
        Route::post($path.'/{id}/uploads', $controller.'@attachUpload')->name($moduleName.'.uploads.store');
        Route::post($path.'/{id}/clone', $controller.'@clone')->name($moduleName.'.clone');

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

    // Update uploaded file
    Route::post('update-file', '\App\Mainframe\Modules\Uploads\UploadController@updateExistingUpload')->name('uploads.update-file');
    // Download
    Route::get('download/{uuid}', '\App\Mainframe\Modules\Uploads\UploadController@download')->name('download');

});