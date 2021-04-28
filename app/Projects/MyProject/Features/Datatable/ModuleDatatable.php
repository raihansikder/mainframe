<?php

namespace App\Projects\MyProject\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\ModuleDatatableTrait;

class ModuleDatatable extends Datatable
{
    use ModuleDatatableTrait;

    /**
     * @param $module
     */
    public function __construct($module = null)
    {
        parent::__construct();
        $this->setModule($module);
    }

}