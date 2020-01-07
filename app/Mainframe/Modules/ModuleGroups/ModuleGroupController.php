<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ModuleGroupController extends ModularController
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
