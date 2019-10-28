<?php

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Helpers\Datatable\Datatable;

class SettingDatatable extends Datatable
{
    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        return [
            ["{$this->moduleName}.id", "id", "Setting ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }

}