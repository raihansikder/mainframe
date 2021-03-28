<?php


namespace App\Mainframe\Http\Controllers;

use App\Mainframe\Features\Core\Traits\DataBlockTrait;
use Str;

class DataBlockController extends BaseController
{
    use DataBlockTrait;

    public $dir = '\App\Mainframe\Features\DataBlocks\\';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


}