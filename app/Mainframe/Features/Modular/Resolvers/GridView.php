<?php

namespace App\Mainframe\Features\Modular\Resolvers;

use App\Mainframe\Modules\Users\User;

class GridView
{
    /**
     * @param $moduleName
     * @param  \App\Mainframe\Modules\Users\User|null  $user
     * @return string
     */
    public static function resolve($moduleName, User $user = null)
    {
        return 'mainframe.modules.'.$moduleName.'.grid.default';
    }

}