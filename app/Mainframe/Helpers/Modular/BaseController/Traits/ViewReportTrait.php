<?php

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use DB;
use View;
use App\Mainframe\Helpers\Report\ModuleReportBuilder;

/** @mixin \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
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
        /** @var  $base_dir  string Define path to results view */
        $base_dir = 'mainframe.layouts.report';

        // Override default if a module specific report blade exists in location  "{moduleName}.report.result"
        if (View::exists('mainframe.modules.'.$this->moduleName.'.report.results')) {
            $base_dir = 'mainframe.modules.'.$this->moduleName.'.report';
        }

        return $base_dir;
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->moduleName, 'report')) {
            $report = new ModuleReportBuilder();
            $report->data_source = $this->reportDataSource();
            $report->base_dir = $this->reportViewBaseDir();

            return $report->show();
        }

        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->moduleName.'.report]');
    }

}