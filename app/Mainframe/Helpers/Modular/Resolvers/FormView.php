<?php

namespace App\Mainframe\Helpers\Modular\Resolvers;

use App\Mainframe\Modules\Users\User;

class FormView
{

    /**
     * @param $moduleName
     * @param  string  $state
     * @param  \App\Mainframe\Modules\Users\User|null  $user
     * @return string
     */
    public static function resolve($moduleName, $state = 'create', User $user = null)
    {
        $default = 'mainframe.modules.'.$moduleName.'.form.default';
        if ($state === 'create') {
            return $default;
        }

        return $default;
    }
}