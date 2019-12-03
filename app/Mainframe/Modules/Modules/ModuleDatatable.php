<?php

namespace App\Mainframe\Modules\Modules;

class ModuleDatatable extends \App\Mainframe\Features\Datatable\ModuleDatatable
{
    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            ["{$this->table}.id", "id", "ID"],
            ["{$this->table}.name", "name", "Name"],
            ["{$this->table}.title", "title", "Title"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->table}.updated_at", "updated_at", "Updated at"],
            ["{$this->table}.is_active", "is_active", "Active"]
        ];
    }

}