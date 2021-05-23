<?php

namespace App\Projects\MyProject\Http\Controllers\Auth;

use App\Mainframe\Http\Controllers\Auth\VerificationController as MfVerificationController;
use Illuminate\Http\Request;

class VerificationController extends MfVerificationController
{
    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('projects.my-project.auth.verify');
    }
}
