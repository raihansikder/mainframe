<?php /** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\ModuleDatatableTrait;

class ModuleDatatable extends Datatable
{

    use ModuleDatatableTrait;


    /**
     * @param $module
     */
    public function __construct($module)
    {
        $this->module = $module;
        parent::__construct($this->module->module_table);
    }

}