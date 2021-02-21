<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Users\Traits\UserDatatableTrait;
use App\Projects\MyProject\Features\Datatable\ModuleDatatable;

class UserDatatable extends ModuleDatatable
{
    use UserDatatableTrait;
}