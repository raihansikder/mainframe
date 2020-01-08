<?php

namespace App\Mainframe\Http\Controller;

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

        $testUser = \App\Mainframe\Modules\Users\User::find(999);

        dd($testUser->can('view-any', Setting::class));

    }

}