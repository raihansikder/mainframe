<?php

namespace App\Mainframe\Modules\ModuleGroups\Traits;

use App\Mainframe\Modules\ModuleGroups\ModuleGroupDatatable;

trait ModuleGroupControllerTrait
{

    /**
     * @return ModuleGroupDatatable
     */
    public function datatable()
    {
        return new ModuleGroupDatatable($this->module);
    }

    /**
     * @return string
     */
    public function home()
    {
        return \Route::getCurrentRoute()->getName();
    }
}