<?php

namespace App\Http\Controllers\Modules;

use App\Mainframe\Features\Datatable\MainframeDatatable;
use App\Mainframe\Modules\Settings\Datatables\DefaultMainframeDatatable;

class SettingsController extends \App\Modules\Settings\Http\Controllers\SettingsController
{



    /**
     * @return \App\Mainframe\Features\Datatable\MainframeDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new DefaultMainframeDatatable($this->moduleName);
    }

}