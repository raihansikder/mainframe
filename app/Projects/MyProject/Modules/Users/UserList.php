<?php

namespace App\Projects\MyProject\Modules\Users;

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
        $query = $this->queryDataSource();
        if (count($this->querySelectColumns())) {
            $query = $query->select($this->querySelectColumns());
        }
        $query = $this->filter($query);

        // Inject tenant context.
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $query->where('tenant_id', user()->tenant_id);
        }

        $query = $this->groupBy($query);
        $query = $this->orderBy($query);

        return $query;
    }
}