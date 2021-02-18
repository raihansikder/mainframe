<?php

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Groups
 *
 * APIs for managing groups
 */
class GroupController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'groups';

    /**
     * @return GroupDatatable
     */
    public function datatable()
    {
        return new GroupDatatable($this->module);
    }
}
