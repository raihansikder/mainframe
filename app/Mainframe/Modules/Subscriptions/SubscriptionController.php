<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SubscriptionController extends ModularController
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
