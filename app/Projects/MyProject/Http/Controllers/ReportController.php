<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Mainframe\Features\Report\Traits\ReportControllerTrait;

class ReportController extends BaseController
{
    use ReportControllerTrait;

    /**
     * Directory where DataBlock classes are stored
     *
     * @var string
     */
    public $dir = '\App\Projects\MyProject\Http\Reports\\';
}