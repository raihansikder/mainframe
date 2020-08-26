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

            return view('projects.my-project.dashboards.admin');
    }



}