<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Uploads\Traits\UploadProcessorTrait;

class UploadProcessor extends ModelProcessor
{
    use UploadProcessorTrait;

    /** @var \App\Mainframe\Modules\Uploads\Upload */
    public $element;

}