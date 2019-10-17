<?php

namespace App\Mainframe\Helpers;

use App\User;

class FormViewResolver
{

    /**
     * @param $moduleName
     * @param  string  $state
     * @param  \App\User|null  $user
     * @return string
     */
    public static function resolve($moduleName, $state = 'create', User $user = null)
    {
        if ($state == 'create') {
            return 'mainframe.modules.'.$moduleName.'.form.default';
        }

        return 'mainframe.modules.'.$moduleName.'.form.default';
    }
}