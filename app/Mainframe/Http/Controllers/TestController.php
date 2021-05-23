<?php

namespace App\Mainframe\Http\Controllers;

use Illuminate\Support\Str;
use App\User;
use App\Module;

class TestController extends BaseController
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {

        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on different user type/group.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function test()
    {

        dd(\user()->inGroup('superauser'));
       return +\user()->inGroup('superaadmin');

    }

}