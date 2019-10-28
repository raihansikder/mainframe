<?php

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Helpers\Datatable\Datatable;

class SettingDatatable extends Datatable
{
    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            [$this->table.".id", 'id', 'SettingID'],
            [$this->table.".name", 'name', 'Name'],
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.".updated_at", 'updated_at', 'Updated at'],
            [$this->table.".is_active", 'is_active', 'Active']
        ];
    }

}