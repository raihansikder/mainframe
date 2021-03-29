<?php

namespace App\Projects\MyProject\Features\Report;

use App\Mainframe\Features\Report\Traits\ReportViewProcessorTrait;
use App\Projects\MyProject\Features\Core\ViewProcessor;

class ReportViewProcessor extends ViewProcessor
{
    use ReportViewProcessorTrait;

    /** @var \App\Mainframe\Features\Report\ReportBuilder */
    public $report;

    /**
     * ReportViewProcessor constructor.
     *
     * @param $reportBuilder
     */
    public function __construct($reportBuilder)
    {
        parent::__construct();
        $this->report = $reportBuilder;
    }


}