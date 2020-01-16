<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class NotificationController extends ModularController
{
    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'notifications';

    /**
     * @return NotificationDatatable
     */
    public function datatable()
    {
        return new NotificationDatatable($this->module);
    }
}
