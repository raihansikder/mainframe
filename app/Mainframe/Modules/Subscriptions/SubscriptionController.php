<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SubscriptionController extends ModularController
{

    /*
     |--------------------------------------------------------------------------
     | Module definitions
     |--------------------------------------------------------------------------
     |
     */
    protected $moduleName = 'subscriptions';

    /**
     * @return SubscriptionDatatable
     */
    public function datatable()
    {
        return new SubscriptionDatatable($this->module);
    }
}
