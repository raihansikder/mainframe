<?php

namespace App\Mainframe\Features\Core;

use App\Mainframe\Features\Modular\BaseModule\Traits\ViewProcessorTrait;
use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Features\Report\Traits\ReportViewProcessorTrait;
use App\Mainframe\Modules\Modules\Module;

class ViewProcessor
{
    use ViewProcessorTrait, ReportViewProcessorTrait;

    public function __construct($element = null)
    {
        $this->user = user();
        $this->setElement($element);
    }

}