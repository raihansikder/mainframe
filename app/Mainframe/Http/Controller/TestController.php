<?php

namespace App\Mainframe\Http\Controller;

use Illuminate\Support\Str;
use App\Mainframe\Modules\Modules\Module;

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

        $modules = Module::all();
        foreach ($modules as $module) {
            $module->namespace = '\App\Mainframe\Modules\\'.Str::plural($module->modelClassName());
            $module->save();
        }

    }

}