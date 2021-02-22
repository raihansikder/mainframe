<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Projects\MyProject\Features\Report\ModuleReportBuilder;

class UserList extends ModuleReportBuilder
{
    /**
     * @var string[]
     */
    public $fullTextFields = ['name', 'name_ext', 'email', 'first_name', 'last_name'];
}