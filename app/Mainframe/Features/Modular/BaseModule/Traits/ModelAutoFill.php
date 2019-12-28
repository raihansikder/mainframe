<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/** @mixin  BaseModule $this */
trait ModelAutoFill
{
    /**
     * Auto fill some of the generic model fields.
     */
    public function autoFill()
    {
        // Inject tenant context.
        $this->autoFillTenant();

        $this->uuid = $this->uuid ?? uuid();
        $this->created_by = $this->created_by ?? user()->id;
        $this->created_at = $this->created_at ?? now();
        $this->updated_by = $this->updated_by ?? user()->id;
        $this->updated_at = now();
    }

    /**
     * Fill tenant id once during creation. Later tenant id can not be
     * updated.
     */
    public function autoFillTenant()
    {
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $this->tenant_id = $this->tenant_id ?: user()->tenant_id;
            $this->mf_project_id = $this->mf_project_id ?: $this->tenant->project_id;
        }
    }

}