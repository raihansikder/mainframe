<?php /** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Helpers\Date;

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
        parent::__construct($this->module->module_table);
    }

    /**
     * Modify datatable row values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    public function modify($dt)
    {
        if ($this->hasColumn('name')) {
            // $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
            $dt = $dt->editColumn('name', function ($row) {
                return '<a href="'.route($this->module->name.'.edit', $row->id).'">'.$row->name.'</a>';
            });
        }
        if ($this->hasColumn('id')) {
            $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        }

        if ($this->hasColumn('is_active')) {
            $dt = $dt->editColumn('is_active', '@if($is_active) Yes @else <span class="text-red">No</span> @endif');
        }

        if ($this->hasColumn('updated_at')) {
            $dt = $dt->editColumn('updated_at', function ($row) {
                return Date::formattedDateTime($row->updated_at);
            });
        }

        return $dt;
    }
}