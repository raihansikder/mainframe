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
     * @param  null  $class
     * @return SettingDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new SettingDatatable($this->name);
    }
}
