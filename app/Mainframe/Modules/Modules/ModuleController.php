<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\ModularController\ModularController;

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