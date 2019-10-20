<?php

namespace App\Mainframe\Modules\Settings\Datatables;

use App\Mainframe\Features\Datatable\Datatable;
use App\Http\Mainframe\Controllers\ModuleBaseController;

class DefaultDatatable extends Datatable
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
            ["{$this->moduleName}.id", "id", "IdddDd"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }


}