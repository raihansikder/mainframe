<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ModuleController extends ModuleBaseController
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