<?php

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Users\Traits\UserControllerTrait;

/**
 * @group  Users
 * APIs for managing users
 */
class UserController extends ModularController
{
    use UserControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'users';

    /**
     * @return UserDatatable
     */
    // public function datatable() { return new UserDatatable($this->module); }

    /**
     * List SuperHero
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function listJson() { return (new ModuleList($this->module))->json(); }

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
