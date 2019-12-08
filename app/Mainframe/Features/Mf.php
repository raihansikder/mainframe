<?php

namespace App\Mainframe\Features;

use Str;
use Schema;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

/**
 * Class Mf
 *
 * @package App\Mainframe\Features
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

    /**
     * Create a unique signature/key for a request made
     * Usually used for caching.
     *
     * @param  String  $append  Raw Query string
     * @return string
     */
    public static function requestSignature($append = null)
    {
        $signature = \URL::full().json_encode(request()->all()).$append;
        if (user()) {
            $signature .= user()->uuid;
        }

        return md5($signature);
    }

    /*
    |--------------------------------------------------------------------------
    | Sanitization
    |--------------------------------------------------------------------------
    |
    |
    |
    */

}