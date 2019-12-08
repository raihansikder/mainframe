<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;
/** @mixin $this BaseModule */
trait TenantContextTrait
{
    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $name
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