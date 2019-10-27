<?php

namespace App\Http\Controllers\Modules;

use App\Mainframe\Features\Datatable\MainframeDatatable;
use App\Mainframe\Modules\Settings\Datatables\DatatableDefault;

class SettingController extends \App\Modules\Settings\Http\Controllers\SettingController
{



    /**
     * @return \App\Mainframe\Features\Datatable\MainframeDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new DatatableDefault($this->moduleName);
    }

}