<?php

namespace App\Mainframe\Modules\Modules\Traits;

trait ModuleDatatableTrait
{
    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            ["{$this->table}.id", 'id', 'ID'],
            ["{$this->table}.name", 'name', 'Name'],
            ['updater.name', 'user_name', 'Updater'],
            ["{$this->table}.updated_at", 'updated_at', 'Updated at'],
            ["{$this->table}.is_active", 'is_active', 'Active'],
        ];
    }

}