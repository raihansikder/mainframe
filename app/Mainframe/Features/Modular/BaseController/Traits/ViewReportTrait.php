<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use DB;
use View;
use App\Mainframe\Features\Report\ModuleReportBuilder;

/** @mixin \App\Mainframe\Features\Modular\BaseController\ModuleBaseController $this */
trait ViewReportTrait
{

    /** @var */
    public $reportDataSource;

    /**
     * Get data source of report
     *
     * @return null|string
     */
    public function reportDataSource()
    {
        return $this->reportDataSource ?: DB::getTablePrefix().$this->module->tableName();
    }

    /**
     * Get base directory of blade views
     *
     * @return string
     */
    public function reportViewBaseDir()
    {
        /** @var  $baseDir  string Define path to results view */
        $baseDir = 'mainframe.layouts.report';

        // Override default if a module specific report blade exists in location  "{moduleName}.report.result"
        if (View::exists('mainframe.modules.'.$this->moduleName.'.report.results')) {
            $baseDir = 'mainframe.modules.'.$this->moduleName.'.report';
        }

        return $baseDir;
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->moduleName, 'report')) {
            $report = new ModuleReportBuilder();
            $report->dataSource = $this->reportDataSource();
            $report->baseDir = $this->reportViewBaseDir();

            return $report->show();
        }

        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->moduleName.'.report]');
    }

}