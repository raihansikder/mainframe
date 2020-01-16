<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ModuleGroupController extends ModularController
{

    /*
     |--------------------------------------------------------------------------
     | Module definitions
     |--------------------------------------------------------------------------
     |
     */
    protected $moduleName = 'settings';

    /**
     * @return ModuleGroupDatatable
     */
    public function datatable()
    {
        return new ModuleGroupDatatable($this->module);
    }
}
