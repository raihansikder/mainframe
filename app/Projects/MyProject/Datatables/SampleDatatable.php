<?php

namespace App\Projects\MyProject\Datatables;

use App\Mainframe\Features\Datatable\Traits\CustomDatatableTrait;
use App\Module;
use App\Projects\MyProject\Features\Datatable\Datatable;
use App\Projects\MyProject\Features\Datatable\ModuleDatatable;

class SampleDatatable extends Datatable
{
    // use CustomDatatableTrait;

    /**
     * @param $module
     */
    public function __construct()
    {
        parent::__construct();
        $this->setModule('users');
        // $this->setTable('users');
    }

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    // public function columns()
    // {
    //     return [
    //         [$this->table.".id", 'id', 'ID'],
    //         [$this->table.".name", 'name', 'Name'],
    //         [$this->table.".group_ids", 'group_ids', 'Groups'],
    //         ['updater.name', 'user_name', 'Updater'],
    //         [$this->table.".updated_at", 'updated_at', 'Updated at'],
    //         [$this->table.".is_active", 'is_active', 'Active'],
    //     ];
    // }
}