<?php

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Helpers\Date;
use App\Mainframe\Modules\Groups\Traits\GroupDatatableTrait;

class GroupDatatable extends ModuleDatatable
{
    use GroupDatatableTrait;

    public $rawColumns = ['id', 'name', 'title', 'is_active'];

}