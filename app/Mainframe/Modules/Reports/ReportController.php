<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Reports\Traits\ReportControllerTrait;

/**
 * @group  Reports
 * APIs for managing reports
 */
class ReportController extends ModularController
{
    use ReportControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'reports';


}
