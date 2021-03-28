<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Mainframe\Features\DataBlocks\DataBlockTrait;

class DataBlockController extends BaseController
{

    use DataBlockTrait;

    public $dir = '\App\Projects\MyProject\Features\DataBlocks\\';

}