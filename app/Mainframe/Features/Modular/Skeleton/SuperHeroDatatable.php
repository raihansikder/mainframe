<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Datatable\ModuleDatatable;

class SuperHeroDatatable extends ModuleDatatable
{
    // Note: Pull in necessary traits

    public $moduleName = 'super-heroes';

    /*---------------------------------
    | Section : Define query tables/model
    |---------------------------------*/
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function source()
    {
        // return \DB::table($this->table)->leftJoin('users as updater', 'updater.id', $this->table.'.updated_by'); // Old table based implementation
       return SuperHero::with(['updater:id,name']); // Model based query.
    }

    /*---------------------------------
    | Section : Define columns
    |---------------------------------*/
    /**
     * @return array
     */
    public function columns()
    {
        return [
            // [TABLE_FIELD, SQL_TABLE_FIELD_AS, HTML_GRID_TITLE],
            [$this->table.'.id', 'id', 'ID'],
            [$this->table.'.name', 'name', 'Name'],
            [$this->table.'.updated_by', 'updated_by', 'Updater'],
            [$this->table.'.updated_at', 'updated_at', 'Updated at'],
            [$this->table.'.is_active', 'is_active', 'Active'],
        ];
    }

    /*---------------------------------
    | Section: SQL Select query
    |---------------------------------*/
    // /**
    //  * Construct SELECT statement (field1 AS f1, field2 as f2...)
    //  *
    //  * @return array
    //  */
    // public function selects()
    // {
    //     $columns = $this->columns();
    //     // Note: Modify the $columns as you need.
    //     return $this->selectQueryString($columns);
    // }

    /*---------------------------------
    | Section: Filters
    |---------------------------------*/
    // /**
    //  * @param  \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|mixed  $query
    //  * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|mixed
    //  */
    // public function filter($query)
    // {
    //     // if (request('id')) { // Example code
    //     //     $query->where('id', request('id'));
    //     // }
    //
    //     return $query;
    // }

    /*---------------------------------
    | Section : Modify row-columns
    |---------------------------------*/
    // /**
    //  * @param  \Yajra\DataTables\DataTableAbstract  $dt
    //  * @return mixed|\Yajra\DataTables\DataTableAbstract
    //  */
    // public function modify($dt)
    // {
    //     $dt = parent::modify($dt);
    //     // $dt->rawColumns(['id', 'email', 'is_active']); // Dynamically set HTML columns
    //
    //     if ($this->hasColumn('updated_by')) {
    //         $dt->editColumn('updated_by', function ($row) { return optional($row->updater)->name; });
    //     }
    //
    //     return $dt;
    // }

    /*---------------------------------
    | Section : Additional methods
    |---------------------------------*/
    // public function query()
    // public function json()
    // public function hasColumn()
    // public function titles()
    // public function columnsJson()
    // public function ajaxUrl()
    // public function identifier()
}