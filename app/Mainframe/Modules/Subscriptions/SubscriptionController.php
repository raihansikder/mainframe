<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class SubscriptionController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('subscriptions');
    }

    /**
     * @return SubscriptionDatatable
     */
    public function datatable()
    {
        return new SubscriptionDatatable($this->module);
    }
}
