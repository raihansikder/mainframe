<?php

namespace App\Mainframe\Http\Controllers;

use App\Mainframe\Features\DataBlocks\DataBlockTrait;

class DataBlockController extends BaseController
{
    use DataBlockTrait;

    /**
     * Directory where DataBlock classes are stored
     *
     * @var string
     */
    public $dir = '\App\Mainframe\Features\DataBlocks\\';

}