<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Datatable\ModuleDatatable;

class SuperHeroDatatable extends ModuleDatatable
{
    // Note: Pull in necessary traits

    /** @var string[] HTML rendering enabled for columns */
    public $rawColumns = ['id', 'name', 'is_active'];

    /*---------------------------------
    | Section : Define query tables/model
    |---------------------------------*/
    // public function source()
    // {
    //     return DB::table($this->table)->leftJoin('users as updater', 'updater.id', $this->table.'.updated_by');
    // }

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
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.'.updated_at', 'updated_at', 'Updated at'],
            [$this->table.'.is_active', 'is_active', 'Active'],
        ];
    }

    /*---------------------------------
    | Section: Filters
    |---------------------------------*/
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
    // public function modify($dt)
    // {
    //     $dt = parent::modify($dt);
    //     $dt->rawColumns(['id', 'email', 'is_active']); // Dynamically set HTML columns
    //
    //     if ($this->hasColumn('column_name')) {
    //         $dt->editColumn('column_name', function ($row) { return $row->column_name.'updated'; });
    //     }
    //
    //     return $dt;
    // }

    /*---------------------------------
    | Section : Additional methods
    |---------------------------------*/
    // public function selects()
    // public function query()
    // public function json()
    // public function hasColumn()
    // public function titles()
    // public function columnsJson()
    // public function ajaxUrl()
    // public function identifier()
}