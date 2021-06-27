<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Reports\Traits\ReportProcessorTrait;

class ReportProcessor extends ModelProcessor
{
    use ReportProcessorTrait;
}