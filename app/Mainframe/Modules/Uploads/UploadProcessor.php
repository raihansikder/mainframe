<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Uploads\Traits\UploadProcessorTrait;

class UploadProcessor extends ModelProcessor
{
    use UploadProcessorTrait;

    /** @var \App\Upload */
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