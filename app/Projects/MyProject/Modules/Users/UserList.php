<?php

namespace App\Projects\MyProject\Modules\Users;

use Illuminate\Database\Query\Builder;
use App\Mainframe\Features\Report\ModuleReportBuilder;

class UserList extends ModuleReportBuilder
{

    /**
     * Build query to get the data.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function resultQuery()
    {
        /** @var Builder $query */
        $query = $this->queryDataSource();
        if (count($this->querySelectColumns())) {
            $query = $query->select($this->querySelectColumns());
        }
        $query = $this->filter($query);

        // Inject tenant context.
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $query->where('tenant_id', user()->tenant_id);
        }

        // Target vendor
        if (user()->ofVendor()) {
            $query->where('users.vendor_id', user()->vendor_id)
                ->whereNotNull('users.vendor_id');
        }

        // Target reseller
        if (user()->ofReseller()) {
            $query->where('users.reseller_id', user()->reseller_id)
                ->whereNotNull('users.reseller_id');
        }

        $query = $this->groupBy($query);
        $query = $this->orderBy($query);

        return $query;
    }
}