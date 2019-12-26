<?php

namespace App\Mainframe\Features\Resolvers;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class PolicyResolver
{

    /**
     * This function is used in app/Providers/AuthServiceProvider.php
     *
     * @param $modelClass
     * @return string
     */
    public static function resolve($modelClass)
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
}