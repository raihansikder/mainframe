<?php

namespace App\Mainframe\Modules\Groups\Traits;

use App\Group;

trait GroupDefinitionsTrait
{
    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function superadmin()
    {
        return Group::where('name', 'superuser')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function api()
    {
        return Group::where('name', 'api')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function projectAdmin()
    {
        return Group::where('name', 'project-admin')
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Get superadmin group
     *
     * @return mixed|Group
     */
    public static function tenantAdmin()
    {
        return Group::where('name', 'tenant-admin')
            ->remember(timer('very-long'))
            ->first();
    }

}