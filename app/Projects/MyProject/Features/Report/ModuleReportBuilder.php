<?php

namespace App\Projects\MphMarket\Features\Report;

use App\Mainframe\Features\Report\ModuleReportBuilder as MfModuleReportBuilder;

class ModuleReportBuilder extends MfModuleReportBuilder
{

    /**
     * Transform request inputs
     */
    public function transformRequest()
    {
        # Hide inactive items for non-admins
        if (user()->isNonAdmin()) {
            request()->merge(['is_active' => 1,]);
        }

        # Only show items related to each user group
        if (user()->ofReseller()) {
            request()->merge(['reseller_id' => user()->reseller_id]);
        }

        if (user()->ofVendor()) {
            request()->merge(['vendor_id' => user()->vendor_id]);
        }

        if (user()->ofClient()) {
            request()->merge(['client_id' => user()->client_id]);
        }
    }

}