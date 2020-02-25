<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Modules\Tenants\Tenant;
use App\Mainframe\Modules\Projects\Project;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this  */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant() { return $this->belongsTo(Tenant::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() { return $this->belongsTo(Project::class); }
}