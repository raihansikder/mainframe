<?php

namespace App\Mainframe\Features\Modular\Resolvers;

use App\Mainframe\Modules\Users\User;

class FormView
{

    /**
     * @param  \App\Mainframe\Modules\Modules\Module  $module
     * @param  string  $state
     * @param  \App\Mainframe\Modules\Users\User|null  $user
     * @return string
     */
    public static function resolve($module, $state = 'create', User $user = null)
    {
        $default = $module->view_directory.'.form.default';
        if ($state == 'create') {
            return $default;
        }

        return $default;
    }
}