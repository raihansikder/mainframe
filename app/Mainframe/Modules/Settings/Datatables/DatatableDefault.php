<?php

namespace App\Mainframe\Modules\Settings\Datatables;

use App\Mainframe\Features\Datatable\MainframeDatatable;
use App\Http\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class DatatableDefault extends MainframeDatatable
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
            ["{$this->moduleName}.id", "id", "test"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }

}