<?php

namespace App\Mainframe\Helpers;

use Str;
use Schema;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

/**
 * Class Mf
 *
 * @package App\Mainframe\Helpers
 */
class Mf
{
    /**
     * This function is used in app/Providers/AuthServiceProvider.php
     *
     * @param $modelClass
     * @return string
     */
    public static function resolvePolicy($modelClass)
    {
        $modelName = class_basename($modelClass);

        if (class_exists('\\App\\Policies\\'.$modelName.'Policy')) {
            $policy = '\\App\\Policies\\'.$modelName.'Policy';
        } elseif (class_exists('App\\Mainframe\\Modules\\'.Str::plural($modelName).'\\'.$modelName.'Policy')) {
            $policy = 'App\\Mainframe\\Modules\\'.Str::plural($modelName).'\\'.$modelName.'Policy';
        } elseif (class_exists($modelClass.'Policy')) {
            $policy = $modelClass.'Policy';
        } else {
            $policy = BaseModulePolicy::class;
        }

        return $policy;
    }

    public static function tenantContext($table, $user = null)
    {
        return false;
    }

    public static function modules()
    {
        return Schema::hasTable('modules') ? Module::list() : [];
    }

    public static function moduleGroups()
    {
        return Schema::hasTable('module_groups') ? ModuleGroup::list() : [];
    }

}