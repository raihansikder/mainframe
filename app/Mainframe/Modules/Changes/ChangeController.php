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

    protected $moduleName = 'changes';

    /*
    |--------------------------------------------------------------------------
    | Note : Keep this empty! Write codes in Trait.
    |--------------------------------------------------------------------------
    |
    | For default mainframe modules keep this empty. Write codes in Trait so
    | that the logic is portable and can be included  in new project modules
    |
    */

}
