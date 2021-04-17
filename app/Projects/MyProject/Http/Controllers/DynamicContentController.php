<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Mainframe\Features\DynamicContents\DynamicContentControllerTrait;

class DynamicContentController extends BaseController
{
    use DynamicContentControllerTrait;

    /**
     * Directory where DataBlock classes are stored
     *
     * @var string
     */
    public $dir = '\App\Projects\MyProject\DynamicContents\\';

}