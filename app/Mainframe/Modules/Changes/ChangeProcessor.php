<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Changes\Traits\ChangeProcessorTrait;

class ChangeProcessor extends ModelProcessor
{
    use ChangeProcessorTrait, ChangeProcessorHelper;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var Change */
    public $element;
    // public $immutables
    // public $transitions
}