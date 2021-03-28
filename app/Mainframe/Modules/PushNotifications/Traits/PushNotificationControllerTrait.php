<?php

namespace App\Mainframe\Modules\PushNotifications\Traits;

use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Modules\PushNotifications\PushNotificationDatatable;

trait PushNotificationControllerTrait
{
    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * PushNotification Datatable
     * @return PushNotificationDatatable
     */
    public function datatable()
    {
        return new PushNotificationDatatable($this->module);
    }

    /**
     * List PushNotification
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    // public function report() { }
    // public function transformInputRequests() { }
    // public function storeRequestValidator() { }
    // public function updateRequestValidator() { }
    // public function saveRequestValidator() { }
    // public function attemptStore() { }
    // public function attemptUpdate() { }
    // public function attemptDestroy() { }
    // public function stored() { }
    // public function updated() { }
    // public function saved() { }
    // public function deleted() { }

    /*
    |--------------------------------------------------------------------------
    | Custom Controller functions
    |--------------------------------------------------------------------------
    | Write down additional controller functions that might be required for your project to handle bu
    */

}