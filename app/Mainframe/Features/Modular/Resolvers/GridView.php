<?php

namespace App\Mainframe\Features\Modular\Resolvers;

use App\Mainframe\Modules\Users\User;

class GridView
{
    /**
     * @param  \App\Mainframe\Modules\Modules\Module  $module
     * @param  \App\Mainframe\Modules\Users\User|null  $user
     * @return string
     */
    public static function resolve($module, User $user = null)
    {
        return $module->view_directory.'.grid.default';
    }

}