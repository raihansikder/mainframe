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
            ["{$this->name}.id", "id", "Module ID"],
            ["{$this->name}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->name}.updated_at", "updated_at", "Updated at"],
            ["{$this->name}.is_active", "is_active", "Active"]
        ];
    }

}