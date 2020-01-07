<?php

namespace App\Mainframe\Features\Resolvers;

use Str;
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


        $paths = [
            '\\App\\Policies\\'.$modelName.'Policy', // Laravel's default policy path
            '\\App\\Mainframe\\Modules\\'.Str::plural($modelName).'\\'.$modelName.'Policy', // Inside mainframe module directory
            $modelClass.'Policy' // In the same directory of the model
        ];

        foreach ($paths as $path) {
            if (class_exists($path)) {
                return $path;
            }
        }

        return BaseModulePolicy::class;

    }
}