<?php

namespace App\Mainframe\Http\Controllers;

use App\Mainframe\Features\DataBlocks\SampleDataBlock;

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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUserData = (new SampleDataBlock)->data();

        return view('projects.my-project.dashboards.admin')->with([
            'totalUserData' => $totalUserData,
        ]);
    }
}