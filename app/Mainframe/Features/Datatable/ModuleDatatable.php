<?php /** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\ModuleDatatableTrait;

class ModuleDatatable extends Datatable
{

    use ModuleDatatableTrait;

    /** @var \App\Mainframe\Modules\Modules\Module */
    public $module;

    /**
     * @param $module
     */
    public function __construct($module)
    {
        $this->module = $module;
        parent::__construct($this->module->module_table);
        $this->ajaxUrl = route($this->module->name.'.datatable-json');
    }



}