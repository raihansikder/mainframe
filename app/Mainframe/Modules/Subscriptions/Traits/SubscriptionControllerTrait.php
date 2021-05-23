<?php

namespace App\Mainframe\Modules\Subscriptions\Traits;

use App\Mainframe\Modules\Subscriptions\SubscriptionDatatable;

trait SubscriptionControllerTrait
{

    /**
     * @return SubscriptionDatatable
     */
    public function datatable()
    {
        return new SubscriptionDatatable($this->module);
    }
}