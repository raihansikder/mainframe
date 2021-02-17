<?php

namespace App\Projects\MyProject\Features\Report;

use App\Mainframe\Features\Report\ModuleReportBuilder as MfModuleReportBuilder;

class ModuleReportBuilder extends MfModuleReportBuilder
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