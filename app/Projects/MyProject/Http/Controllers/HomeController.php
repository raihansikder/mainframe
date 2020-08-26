<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Projects\MyProject\Http\Controllers\BaseController;

class HomeController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (user()->isAdmin() || user()->isAdminL2()) {
            return view('projects.my-project.dashboards.admin');
        }


        return view('projects.my-project.dashboards.default');
    }



}