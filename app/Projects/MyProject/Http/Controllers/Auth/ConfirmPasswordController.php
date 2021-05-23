<?php

namespace App\Projects\MyProject\Http\Controllers\Auth;

use App\Mainframe\Http\Controllers\Auth\ConfirmPasswordController as MfConfirmPasswordController;
use App\Projects\MyProject\Providers\RouteServiceProvider;

class ConfirmPasswordController extends MfConfirmPasswordController
{
    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

}