<?php

namespace App\Mainframe\Modules\Groups\Traits;

trait GroupDefinitionsTrait
{
    /**
     * Get group ids of super user/admin user
     *
     * @return array
     */
    public static function superadminGroupIds()
    {
        return [1];
    }

}