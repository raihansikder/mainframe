<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Modules
 *
 * APIs for managing modules
 */
class ModuleController extends ModularController
{
    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'modules';

    public function datatable()
    {
        return new ModuleDatatable($this->module);
    }
}