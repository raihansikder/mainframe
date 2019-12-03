<?php

namespace App\Mainframe\Features\Modular\BaseController;

use View;
use App\Http\Controllers\Controller;
use App\Mainframe\Features\Modular\BaseController\Traits\Validable;
use App\Mainframe\Features\Modular\BaseController\Traits\SendResponse;
use App\Mainframe\Features\Modular\BaseController\Traits\HasMessageBag;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{

    use Validable, SendResponse, HasMessageBag;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        // $this->messageBag = resolve(MessageBag::class);
        // $this->response() = resolve(Response::class);
        View::share(['user' => user()]);
    }

}
