<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\DolorSits;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

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
     * @return DolorSitDatatable
     */
    public function datatable()
    {
        return new DolorSitDatatable($this->module);
    }
}
