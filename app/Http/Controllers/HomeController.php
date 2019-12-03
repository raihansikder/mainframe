<?php

namespace App\Http\Controllers;

use App\Mainframe\Features\Modular\BaseController\BaseController;

class HomeController extends BaseController
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
    public function index()
    {
        /** @var \App\Mainframe\Modules\Users\User $user */
        // $user = \Auth::user();
        return $this->response()->view("dashboards.default.index");
    }

}
