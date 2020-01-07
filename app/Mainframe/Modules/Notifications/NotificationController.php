<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class NotificationController extends ModularController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('notifications');
    }

    /**
     * @return NotificationDatatable
     */
    public function datatable()
    {
        return new NotificationDatatable($this->module);
    }
}
