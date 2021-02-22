<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Features\Core\ViewProcessor;
use App\Mainframe\Features\Report\Traits\ReportViewProcessorTrait;

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