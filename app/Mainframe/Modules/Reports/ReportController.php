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
     * @param  null  $class
     * @return ReportDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new ReportDatatable($this->name);
    }
}
