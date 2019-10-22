<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait PermissionsTrait
{

    /**
     * @param $permission
     * @return bool
     */
    public function can($permission)
    {
        /** @var  \App\Http\Mainframe\Controllers\ModuleBaseController|$this|self $this */
        return hasModulePermission($this->moduleName, $permission);
    }
}