<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Uploads\Traits\UploadViewProcessorTrait;

class UploadViewProcessor extends BaseModuleViewProcessor
{
    use UploadViewProcessorTrait;
}