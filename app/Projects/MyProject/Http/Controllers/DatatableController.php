<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Mainframe\Features\DataBlocks\DataBlockControllerTrait;

class DatatableController extends BaseController
{
    use DataBlockControllerTrait;

    /**
     * Directory where DataBlock classes are stored
     *
     * @var string
     */
    public $dir = '\App\Projects\MyProject\Http\Datatables\\';

}