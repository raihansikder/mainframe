<?php

namespace App\Traits;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Rememberable\Rememberable;

trait IsoTenant
{

    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $module_name
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