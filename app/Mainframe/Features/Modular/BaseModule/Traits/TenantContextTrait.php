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
        if (array_key_exists('tenant_id', $this->getAttributes())) {
            return user()->tenant_id;
        }

        return false;
    }
}