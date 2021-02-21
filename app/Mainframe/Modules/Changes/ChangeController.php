<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Changes\Traits\ChangeControllerTrait;

/**
 * @group  Changes
 * APIs for managing changes
 */
class ChangeController extends ModularController
{
    use ChangeControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'changes';

}
