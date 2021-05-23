<?php

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Settings\Traits\SettingControllerTrait;

/**
 * @group  Settings
 * APIs for managing settings
 */
class SettingController extends ModularController
{

    use SettingControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
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
