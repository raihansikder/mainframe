<?php

namespace App\Projects\MyProject\Features\Report;

use App\Projects\MyProject\Features\Core\ViewProcessor;

class ReportViewProcessor extends ViewProcessor
{

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