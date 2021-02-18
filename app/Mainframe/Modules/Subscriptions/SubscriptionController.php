<?php

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Subscriptions
 * APIs for managing subscriptions
 */
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
