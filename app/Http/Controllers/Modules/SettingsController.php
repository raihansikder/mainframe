<?php

namespace App\Http\Controllers\Modules;

use App\Mainframe\Features\Datatable\Datatable;
use App\Mainframe\Modules\Settings\Datatables\DefaultDatatable;

class SettingsController extends \App\Modules\Settings\Http\Controllers\SettingsController
{



    /**
     * @return \App\Mainframe\Features\Datatable\Datatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new DefaultDatatable($this->moduleName);
    }

}