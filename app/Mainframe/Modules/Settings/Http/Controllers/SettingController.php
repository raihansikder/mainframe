<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Modules\Settings\Http\Controllers;

use App\Http\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class SettingController extends ModuleBaseController
{
    /**
     * @param  null  $moduleName
     */
    public function __construct()
    {

        parent::__construct('settings');

    }
}
