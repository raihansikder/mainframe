<?php

namespace App\Mainframe\Helpers;

use Str;
use Route;
use App\Module;
use App\ModuleGroup;

class Mf
{

    /**
     * Generate main frame module routes and other supporting routes.
     */
    public static function webRoutes()
    {
        $modules      = dbTableExists('modules') ? Module::all() : []; // dbTableExists() was causing issue.
        $moduleGroups = dbTableExists('module_groups') ? ModuleGroup::all() : [];

        # default routes for all modules
        foreach ($modules as $module) {
            $controller = $module->controller;
            $moduleName = $module->name;
            $var = $module->name;

            Route:: get($moduleName."/{".Str::singular($moduleName)."}/restore", $controller."@restore")->name($moduleName.'.restore');
            Route:: get($moduleName."/datatable/json", $controller."@datatableJson")->name($moduleName.'.datatable-json');
            Route:: get($moduleName."/list/json", $controller."@list")->name($moduleName.'.list-json');
            Route:: get($moduleName."/report", $controller."@report")->name($moduleName.'.report');
            Route:: get($moduleName."/{".Str::singular($moduleName)."}/changes", $controller."@changes")->name($moduleName.'.changes');
            Route::resource($moduleName, $controller);
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

    }
}