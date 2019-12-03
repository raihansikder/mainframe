<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ReportController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('reports');
    }

    /**
     * @return ReportDatatable
     */
    public function datatable()
    {
        return new ReportDatatable($this->module);
    }
}
