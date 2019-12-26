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
        return $this->hasColumn('tenant_id');
    }
}