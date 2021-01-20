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
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function query()
    {
        $query = $this->source()->select($this->selects());

        // Inject tenant context.
        if (user()->ofTenant() && $this->module->tenantEnabled()) {
            $query->where($this->module->tableName().'.tenant_id', user()->tenant_id);
        }

        // Exclude deleted rows
        $query = $query->whereNull($this->table.'.deleted_at');

        return $this->filter($query);
    }

    /**
     * Modify datatable values
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
            $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
        }

        if ($this->hasColumn('updated_at')) {
            $dt = $dt->editColumn('updated_at', function ($row) {
                return Date::formattedDateTime($row->updated_at);
            });
        }

        return $dt;
    }
}