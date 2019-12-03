<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ModuleGroupController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('module-groups');
    }

    /**
     * @return ModuleGroupDatatable
     */
    public function datatable()
    {
        return new ModuleGroupDatatable($this->module);
    }
}
