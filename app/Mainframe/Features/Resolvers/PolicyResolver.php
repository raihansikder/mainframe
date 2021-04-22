<?php
/** @noinspection ALL */

namespace App\Mainframe\Features\Resolvers;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\Module;
use Str;

class PolicyResolver
{

    /**
     * This function is used in app/Providers/AuthServiceProvider.php
     *
     * @param $modelClass  '\App\Mainframe\Modules\Foo\Bar'
     * @return string
     */
    public static function resolve($modelClass)
    {
        $module = Module::byClass(class_basename($modelClass));
        // $module = Module::where('model', '\\'.$modelClass)
        //     ->remember(timer('very-long'))
        //     ->first();

        $modulePolicy = $module ? $module->policy : 'NoFile';

        $modelName = class_basename($modelClass);
        $paths = [
            $modulePolicy,        // Check module table value
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

        return BaseModulePolicy::class;
    }
}