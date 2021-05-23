<?php

namespace App\Mainframe\Modules\Comments\Traits;

trait CommentDatatableTrait
{

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    // public function source()
    // {
    //     return DB::table($this->table)
    //         ->leftJoin('users as updater', $this->table.'.updated_by', 'updater.id');
    // }

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            [$this->table.'.id', 'id', 'ID'],
            [$this->table.'.name', 'name', 'Name'],
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.'.updated_at', 'updated_at', 'Updated at'],
            [$this->table.'.is_active', 'is_active', 'Active'],
        ];
    }

    // /**
    //  * Define Query for generating results for grid
    //  *
    //  * @return $this|mixed
    //  */
    // public function query()
    // {
    //     $query = $this->source()->select($this->selects());
    //
    //     // Inject tenant context in grid query
    //     if ($tenant_id = inTenantContext($this->table)) {
    //         $query = injectTenantIdInModelQuery($this->table, $query);
    //     }
    //
    //     // Exclude deleted rows
    //     $query = $query->whereNull($this->table.'.deleted_at'); // Skip deleted rows
    //
    //     return $query;
    // }

    // /**
    //  * Modify datatable values
    //  *
    //  * @return mixed
    //  * @var $dt \Yajra\DataTables\DataTableAbstract
    //  */
    // public function modify($dt)
    // {
    //     $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
    //     $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
    //     $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
    //
    //     return $dt;
    // }
}