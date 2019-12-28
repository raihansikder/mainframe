<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\MfProjects;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class MfProjectController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('mf-projects');
    }

    /**
     * @return MfProjectDatatable
     */
    public function datatable()
    {
        return new MfProjectDatatable($this->module);
    }
}
