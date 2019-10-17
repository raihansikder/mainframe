<?php

namespace App\Mainframe\Traits;

use DB;
use App\Http\Mainframe\Controllers\ModuleBaseController;

/**
 * Trait IsoGrid
 *
 * @var $this ModuleBaseController
 * @package App\Traits
 */
trait IsoGridDatatable
{

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function gridColumns()
    {
        /** @var ModuleBaseController $this */
        return [
            ["{$this->moduleName}.id", "id", "ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }

    /**
     * Construct SELECT statement based
     *
     * @return array
     */
    public function selectColumns()
    {
        $select_cols = [];
        foreach ($this->gridColumns() as $col) {
            $select_cols[] = $col[0].' as '.$col[1];
        }

        return $select_cols;
    }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function sourceTables()
    {
        return DB::table($this->moduleName)
            ->leftJoin('users as updater', $this->moduleName.'.updated_by', 'updater.id');
    }

    /**
     * Define Query for generating results for grid
     *
     * @return $this|mixed
     */
    public function gridQuery()
    {
        $query = $this->sourceTables()->select($this->selectColumns());

        // Inject tenant context in grid query
        if ($tenant_id = inTenantContext($this->moduleName)) {
            $query = injectTenantIdInModelQuery($this->moduleName, $query);
        }

        // Exclude deleted rows
        $query = $query->whereNull($this->moduleName.'.deleted_at'); // Skip deleted rows

        return $query;
    }

    /**
     * Modify datatable values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    public function datatableModify($dt)
    {
        // First set columns for  HTML rendering
        $dt = $dt->rawColumns(['id', 'name', 'is_active']); // HTML can be printed for raw columns

        // Next modify each column content
        /*  @var $dt \Yajra\DataTables\DataTableAbstract */

        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$name}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        return $dt;
    }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    public function grid()
    {
        // Make datatable
        /** @var \Yajra\DataTables\DataTableAbstract $dt */
        $dt = datatables($this->gridQuery());
        $dt = $this->datatableModify($dt);

        return $dt->toJson();
    }

}