<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Modules\Comments\Traits\CommentProcessorTrait;
use App\Module;
use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class CommentProcessor extends ModelProcessor
{
    use CommentProcessorTrait;

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