<?php

namespace App\Mainframe\Traits\ModuleBaseController;

use Request;
use Response;
use App\Http\Mainframe\Controllers\ModuleBaseController;

trait ShowChangesTrait
{
    /**
     * Show all the changes/change logs of an item
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|ModuleBaseController
     */
    public function changes($id)
    {
        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \App\Mainframe\Basemodule $element */
        // init local variables

        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \App\Mainframe\Basemodule $element */
        $Model = model($this->moduleName);
        //$ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // Check if the element you are trying to edit exists
            if ($element->isViewable()) { // Check if the element is viewable
                $changes = $element->changes;
                $ret     = ret('success', '', ['data' => $changes]);
            } else { // Not viewable by the user. Set error message and return value.
                $ret = ret('fail', 'The element is not view-able by current user.');
                //return showPermissionErrorPage("The element is not view-able by current user.");
            }
        } else { // The element does not exist. Set error and return values
            $ret = ret('fail', 'The item that you are trying to access does not exist or has been deleted');
            //return showGenericErrorPage("The item that you are trying to access does not exist or has been deleted");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if (Request::get('ret') === 'json') {
            return Response::json(fillRet($ret));
        }

        if ($ret['status'] === 'fail') { // Update failed. Redirect to fail path(url)
            return showGenericErrorPage($ret['message']);
        }

        // Update successful. Redirect to success path(url)

        /** @var array $changes */
        return view('mainframe.layouts.module.changes.index')
            ->with('changes', $changes);
    }
}