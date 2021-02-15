<?php

namespace App\Projects\MyProject\Features\Report;

class ModuleReportBuilder extends ReportBuilder
{

    /**
     * Transform request inputs
     */
    public function transformRequest()
    {
        # Hide inactive items for non-admins
        if (! user()->isSuperUser()) {
            request()->merge(['is_active' => 1,]);
        }
    }

}