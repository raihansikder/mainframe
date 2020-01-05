<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ModuleController extends ModularController
{
    public function __construct()
    {
        parent::__construct('modules');
    }

    public function datatable()
    {
        return new ModuleDatatable($this->module);
    }
}