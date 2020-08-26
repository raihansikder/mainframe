<?php

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SettingController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'settings';

    /**
     * @return SettingDatatable
     */
    public function datatable()
    {
        return new SettingDatatable($this->module);
    }


}
