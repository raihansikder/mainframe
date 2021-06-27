<?php

namespace App\Mainframe\Modules\Reports\Traits;

use App\Report;

trait ReportDatatableTrait
{
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
            [$this->table.'.description', 'description', 'Description'],
            [$this->table.'.parameters', 'parameters', 'Parameters'],
            [$this->table.'.updated_by', 'updated_by', 'Updater'],
            [$this->table.'.updated_at', 'updated_at', 'Updated at'],
            [$this->table.'.is_active', 'is_active', 'Active'],
            [$this->table.'.id', 'action', '-'],
        ];
    }

    public function hidden()
    {
        return $this->hidden ?? ['parameters'];
    }


    /*---------------------------------
    | Section : Modify row-columns
    |---------------------------------*/
    public function modify($dt)
    {
        $dt = parent::modify($dt);
        $dt->rawColumns(['id', 'name', 'is_active', 'action']); // Dynamically set HTML columns

        if ($this->hasColumn('action')) {
            $dt->editColumn('action', function ($row) {

                /** @var Report $row */
                return "<a class='btn btn-default bg-smart-blue' href={$row->url()}>Run</a>";
            });
        }

        return $dt;
    }
}