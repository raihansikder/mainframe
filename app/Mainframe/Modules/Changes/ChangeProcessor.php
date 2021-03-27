<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Changes\Traits\ChangeProcessorTrait;

class ChangeProcessor extends ModelProcessor
{
    use ChangeProcessorTrait;

    /** @var Change */
    public $element;

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