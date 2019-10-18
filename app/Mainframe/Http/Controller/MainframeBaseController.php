<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Mainframe\Controllers;

use DB;
use View;
use Request;
use Response;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\IsoGridDatatable;
use App\Classes\Reports\DefaultModuleReport;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput;
    use IsoGridDatatable;

    public function __construct()
    {

    }



}
