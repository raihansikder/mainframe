<?php

namespace App\Mainframe\Traits;

use Request;
use Redirect;
use Response;

trait IsoOutput
{

    /**
     * Returns JSON or Redirects to another route based on Request parameters.
     * @param $ret
     * @param  \App\Http\Mainframe\Features\Modular\BaseModule\BaseModule|null  $element
     * @param  \Validator  $validator
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function jsonOrRedirect($ret, $validator = null, $element = null)
    {

        /*
         * Resolve redirect_success route. When a new element is created then
         * we may need to redirect to the element.edit route.
         */

        $success_route = null;
        if ($element) {

            if ($ret['status'] == 'success' && Request::has('redirect_success')) {

                if (Request::get('redirect_success') === '#new') {
                    $success_route = route($element->module()->name.".edit", $element->id);
                } else {
                    $success_route = Request::get('redirect_success');
                }
            }
        }

        /**
         * Handle json response
         */
        if (Request::get('ret') === 'json') {

            // fill with session values(messages, errors, success etc) and redirect
            $ret = fillRet($ret);
            // Json return only return a single redirect destination route.
            if ($success_route) {
                $ret['redirect'] = $success_route;
            }

            return Response::json($ret);

        }

        /**
         * Handle redirect to success/failure routes
         */
        if ($ret['status'] === 'fail') {
            // Obtain redirection path based on url param redirect_fail
            // Or, default redirect to back if no param is set.
            // dd(Redirect::back());
            $redirect = Request::has('redirect_fail') ? Redirect::to(Request::get('redirect_fail')) : Redirect::back();
            // dd($redirect);
            // Include Inputs and Validation errors in redirection.
            $redirect = $redirect->withInput();
            if (isset($validator)) {
                $redirect = $redirect->withErrors($validator);
            }
        } else {
            // Obtain redirection path based on url param redirect_fail
            // Or, default redirect to back if no param is set.
            if (Request::has('redirect_success')) {
                $redirect = Redirect::to($success_route);
            } else {
                $redirect = Redirect::back();
            }
        }

        return $redirect;

    }
}