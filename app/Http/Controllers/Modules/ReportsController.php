<?php

namespace App\Http\Controllers;

use App\Report;
use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class ReportsController extends ModuleBaseController
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
            //['table.id', 'id', 'ID'], // translates to => table.id as id and the last one ID is grid column header
            ["{$this->moduleName}.id", "id", "ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"],
            ["{$this->moduleName}.id", "action", "Action"] // This is a shadow column where we added the Run button
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
    //     return DB::table($this->moduleName)
    //         ->leftJoin('users as updater', $this->moduleName . '.updated_by', 'updater.id');
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
    //     if ($tenant_id = inTenantContext($this->moduleName)) {
    //         $query = injectTenantIdInModelQuery($this->moduleName, $query);
    //     }
    //
    //     // Exclude deleted rows
    //     $query = $query->whereNull($this->moduleName . '.deleted_at'); // Skip deleted rows
    //
    //     return $query;
    // }

    /**
     * Modify datatable values
     *
     * @var $dt \Yajra\DataTables\DataTableAbstract
     * @return mixed
     */
    public function datatableModify($dt)
    {
        /** @var $dt \Yajra\DataTables\DataTableAbstract */
        // First set columns for  HTML rendering
        $dt = $dt->rawColumns(['id', 'name', 'is_active', 'action']); // HTML can be printed for raw columns

        // Next modify each column content
        $dt = $dt->editColumn('name', '<a href="{{ route(\'' . $this->moduleName . '.edit\', $id) }}">{{$name}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\'' . $this->moduleName . '.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        $dt = $dt->editColumn('action', function ($row) {
            return ' <a href="' . Report::getReportUrlFromId($row->id) . '" class="btn btn-sm btn-flat btn-success" type=\'button\'
       target="_blank"> Run </a>';
        });

        // $this->gridColumns = array_merge($this->gridColumns, [['action', 'action', 'Action']]);

        return $dt;
    }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @var \Yajra\DataTables\DataTables $dt
     * @return \Illuminate\Http\JsonResponse
     */
    public function grid()
    {
        // Make datatable
        /** @var \Yajra\DataTables\DataTableAbstract $dt */
        $dt = datatables($this->gridQuery());
        $dt = $this->datatableModify($dt);
        return $dt->toJson();
    }

    // ****************** Grid functions end *********************************

}
