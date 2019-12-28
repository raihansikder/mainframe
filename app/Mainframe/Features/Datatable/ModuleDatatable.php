<?php /** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

class ModuleDatatable extends Datatable
{

    /** @var \App\Mainframe\Modules\Modules\Module */
    public $module;

    /**
     * @param $module
     */
    public function __construct($module)
    {
        $this->module = $module;
        parent::__construct($this->module->tableName());
    }

    /**
     * Modify datatable values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    public function modify($dt)
    {
        // Set columns for HTML output.
        $dt = $dt->rawColumns(['id', 'name', 'is_active']);

        // Next modify each column content
        /*  @var $dt \Yajra\DataTables\DataTableAbstract */
        $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        return $dt;
    }
}