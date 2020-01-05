<?php

namespace App\Http\Controllers;

use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Http\Controller\BaseController;

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
     */
    public function test()
    {

        $user2 = \App\Mainframe\Modules\Users\User::find(2);

        $user2->can('create', Setting::class);

        return abort(403);
    }


    // 9612111777
    // partnersebakendra uttara 6, Sonargao road, sector 12, Uttara, Dhaka 1230

}
