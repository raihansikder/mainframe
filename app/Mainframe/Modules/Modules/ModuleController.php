<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class ModuleController extends ModuleBaseController
{
    public function __construct()
    {
        parent::__construct('modules');
    }
}