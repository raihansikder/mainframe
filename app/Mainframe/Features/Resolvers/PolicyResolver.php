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
            $modelClass.'Policy', // In the same directory of the model
            '\\App\\Policies\\'.$modelName.'Policy', // Laravel's default policy path
            '\\App\\Mainframe\\Modules\\'.Str::plural($modelName).'\\'.$modelName.'Policy', // Inside mainframe module directory
            '\\App\\Mainframe\\Policies\\'.$modelName.'Policy', // Inside mainframe policies directory
        ];

        foreach ($paths as $path) {
            if (class_exists($path)) {
                return $path;
            }
        }

        // test pull request
        return BaseModulePolicy::class;

    }
}