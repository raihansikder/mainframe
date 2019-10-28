<?php

namespace App\Mainframe\Helpers\Modular\
BaseController;

trait PermissionsTrait
{

    /**
     * @param $permission
     * @return bool
     */
    public function can($permission)
    {
        /** @var  \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|$this|self $this */
        return hasModulePermission($this->moduleName, $permission);
    }
}