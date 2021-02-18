<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Reports
 * APIs for managing reports
 */
class ReportController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'reports';

    /**
     * @return ReportDatatable
     */
    public function datatable()
    {
        return new ReportDatatable($this->module);
    }
}
