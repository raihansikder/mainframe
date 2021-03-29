<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Projects\MyProject\Features\DataBlocks\SampleDataBlock;

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
        $this->view('projects.my-project.dashboards.admin');
        $sampleData = (new SampleDataBlock)->data();

        return $this->response()->setViewVars(['sampleData' => $sampleData])->send();
    }

}