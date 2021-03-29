<?php

namespace App\Projects\MyProject\Http\Controllers\Api;

use App\Mainframe\Http\Controllers\Api\Traits\UserApiControllerTrait;

/**
 * @authenticated
 */
class UserApiController extends ApiController
{
    use UserApiControllerTrait;

    /** @var \App\User */
    protected $user;

    public function __construct()
    {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Project specific user APIs
    |--------------------------------------------------------------------------
    |
    | Following are the functions that handles API request. These are mapped
    | in app/Projects/MyProject/routes/api.php
    |
    */

}