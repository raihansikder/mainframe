<?php

namespace App\Http\Controllers;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ChangesController extends ModuleBaseController
{

    /*********************************************************************
     * Grid related functions.
     * Uncomment the functions to show modified grid.
     ********************************************************************/

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function gridColumns()
    {
        return [
            //['table.id', 'id', 'ID'], // translates to => table.id as id and the last one ID is grid colum header
            ["{$this->name}.id", "id", "ID"],
            ["{$this->name}.name", "name", "Name"],
            ["{$this->name}.name", "name", "Module"],
            // ["{$this->name}.field", "field", "Field"],
            // ["{$this->name}.old", "old", "Old value"],
            // ["{$this->name}.new", "new", "New value"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->name}.updated_at", "updated_at", "Updated at"],
            ["{$this->name}.is_active", "is_active", "Active"]
        ];
    }

    /**
     * Construct SELECT statement based
     *
     * @return array
     */
    // public function selectColumns()
    // {
    //     $select_cols = [];
    //     foreach ($this->gridColumns() as $col)
    //         $select_cols[] = $col[0] . ' as ' . $col[1];
    //
    //     return $select_cols;
    // }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    // public function sourceTables()
    // {
    //     return DB::table($this->name)
    //         ->leftJoin('users as updater', $this->name . '.updated_by', 'updater.id');
    // }

    /**
     * Define Query for generating results for grid
     *
     * @return $this|mixed
     */
    // public function gridQuery()
    // {
    //     $query = $this->sourceTables()->select($this->selectColumns());
    //
    //     // Inject tenant context in grid query
    //     if ($tenant_id = inTenantContext($this->name)) {
    //         $query = injectTenantIdInModelQuery($this->name, $query);
    //     }
    //
    //     // Exclude deleted rows
    //     $query = $query->whereNull($this->name . '.deleted_at'); // Skip deleted rows
    //
    //     return $query;
    // }

    /**
     * Modify datatable values
     *
     * @var $dt \Yajra\DataTables\DataTableAbstract
     * @return mixed
     */
    // public function datatableModify($dt)
    // {
    //     // First set columns for  HTML rendering
    //     $dt = $dt->rawColumns(['id', 'name', 'is_active']); // HTML can be printed for raw columns
    //
    //     // Next modify each column content
    //     $dt = $dt->editColumn('name', '<a href="{{ route(\'' . $this->name . '.edit\', $id) }}">{{$name}}</a>');
    //     $dt = $dt->editColumn('id', '<a href="{{ route(\'' . $this->name . '.edit\', $id) }}">{{$id}}</a>');
    //     $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
    //
    //     return $dt;
    // }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @var \Yajra\DataTables\DataTables $dt
     * @return \Illuminate\Http\JsonResponse
     */
    // public function grid()
    // {
    //     // Make datatable
    //     /** @var \Yajra\DataTables\DataTableAbstract $dt */
    //     $dt = datatables($this->gridQuery());
    //     $dt = $this->datatableModify($dt);
    //     return $dt->toJson();
    // }

    // ****************** Grid functions end *********************************
}
