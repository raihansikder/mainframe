<?php

namespace App\Mainframe\Traits\ModuleBaseController;

use DB;
use View;
use App\Classes\Reports\DefaultModuleReport;

trait ViewReportTrait
{


    /**
     * Get data source of report
     *
     * @return null|string
     */
    public function reportDataSource()
    {
        return $this->reportDataSource ?? DB::getTablePrefix().$this->moduleName;
    }

    /**
     * Get base directory of blade views
     *
     * @return string
     */
    public function reportViewBaseDir()
    {
        /** @var  $base_dir  string Define path to results view */
        $base_dir = 'modules.base.report';

        // Override default if a module specific report blade exists in location  "{moduleName}.report.result"
        if (View::exists('modules.'.$this->moduleName.'.report.results')) {
            $base_dir = 'modules.'.$this->moduleName.'.report';
        }

        return $base_dir;
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->moduleName, 'report')) {
            $report              = new DefaultModuleReport();
            $report->data_source = $this->reportDataSource();
            $report->base_dir    = $this->reportViewBaseDir();

            return $report->show();
        }

        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->moduleName.'.report]');
    }

}