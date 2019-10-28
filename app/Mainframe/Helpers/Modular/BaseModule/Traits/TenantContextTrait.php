<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

trait TenantContextTrait
{
    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $moduleName
     */
    public function hasTenantContext()
    {
        $tenant_field = tenantIdField();
        if ($this->$tenant_field) {
            return user()->$tenant_field;
        }
        return false;
    }
}