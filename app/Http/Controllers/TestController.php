<?php

namespace App\Http\Controllers;

use App\Mainframe\Modules\LoremIpsums\LoremIpsum;
use App\Mainframe\Features\Modular\BaseController\BaseController;

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
        $results = LoremIpsum::active()->get()->toArray();
        echo 'test';
        return;
    }

}
