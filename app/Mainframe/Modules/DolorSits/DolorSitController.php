<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\DolorSits;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class DolorSitController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('dolor-sits');
    }

    /**
     * @param  null  $class
     * @return DolorSitDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new DolorSitDatatable($this->moduleName);
    }
}
