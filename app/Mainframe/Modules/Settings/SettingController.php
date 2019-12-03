<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class SettingController extends ModuleBaseController
{

    public function __construct()
    {
        parent::__construct('settings');
    }

    /**
     * @return SettingDatatable
     */
    public function datatable()
    {
        return new SettingDatatable($this->module);
    }
}
