<?php

namespace App\Mainframe\Helpers\Modular\Resolvers;

use App\User;

class GridView
{
    /**
     * @param $moduleName
     * @param  \App\User|null  $user
     * @return string
     */
    public static function resolve($moduleName, User $user = null)
    {
        return 'mainframe.modules.'.$moduleName.'.grid.default';
    }

}