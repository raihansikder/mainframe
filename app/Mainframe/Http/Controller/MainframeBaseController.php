<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Mainframe\Controllers;

use Illuminate\Support\MessageBag;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput;

    protected $messageBag;

    public function __construct()
    {

        $this->messageBag = new MessageBag();
    }

}
