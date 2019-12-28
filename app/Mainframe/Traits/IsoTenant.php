<?php

namespace App\Mainframe\Traits;

use App\Mainframe\Modules\Users\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Rememberable\Rememberable;

trait IsoTenant
{

    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $name
     */
    public function hasTenantContext()
    {
        $tenant_field = 'tenant_id';
        if ($this->$tenant_field) {
            return user()->$tenant_field;
        }
        return false;
    }
}