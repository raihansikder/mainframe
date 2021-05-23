<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Modules\Traits\ModuleProcessorTrait;

class ModuleProcessor extends ModelProcessor
{
    use ModuleProcessorTrait;

    public $element;
    public $element_original;
    public $valid = true;


}