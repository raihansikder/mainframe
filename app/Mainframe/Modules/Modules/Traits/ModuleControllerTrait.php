<?php

namespace App\Mainframe\Modules\Modules\Traits;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Modules\ModuleDatatable;

/** @mixin Module $this */
trait ModuleControllerTrait
{
    public function datatable()
    {
        return new ModuleDatatable($this->module);
    }

}