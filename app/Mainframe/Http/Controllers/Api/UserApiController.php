<?php
/**
 * User/Bearer API
 */

namespace App\Mainframe\Http\Controllers\Api;

use App\Mainframe\Http\Controllers\Api\Traits\UserApiControllerTrait;

class UserApiController extends ApiController
{

    use UserApiControllerTrait;

    /** @var \App\User|null|mixed */
    protected $user;

    public function __construct()
    {
        parent::__construct();
    }

}