<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Reports\Traits\ReportViewProcessorTrait;

class ReportViewProcessor extends BaseModuleViewProcessor
{
    use ReportViewProcessorTrait;
}