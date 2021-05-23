<?php

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Users\Traits\UserProcessorTrait;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UserProcessor extends ModelProcessor
{

    use UserProcessorTrait;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var User */
    public $element;

    public $immutables = ['email'];
    // public $transitions;
    // public $trackedFields;

}
