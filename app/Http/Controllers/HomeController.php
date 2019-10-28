<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
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
        return view("dashboards.default.index");
    }

}
