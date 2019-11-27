<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Datatable\Datatable;
use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ModuleDatatable extends Datatable
{
    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        /** @var ModuleBaseController $this */
        return [
            ["{$this->moduleName}.id", "id", "Module ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }

}