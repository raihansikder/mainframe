<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\MfProjects;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class MfProjectController extends ModularController
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
