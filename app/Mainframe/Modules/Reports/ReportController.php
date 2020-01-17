<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\ModularController\ModularController;

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
