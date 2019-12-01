<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Modules\Modules\Module;

trait ReportHelper
{
    /**
     * Get module default report url.
     *
     * @param $module_id
     * @return string
     */
    public static function defaultForModule($module_id)
    {
        /** @var \App\Report $default_report */
        $default_report = Report::where('module_id', $module_id)->where('is_module_default', 1)
            ->remember(cacheTime('long'))->first();

        if ($default_report) {
            $report_url = $default_report->url();
        } else {
            $module = Module::remember(cacheTime('long'))->find($module_id);
            $report_url = route($module->name.'.report')."?submit=Run&"
                ."select_columns_csv=id%2Cname%2Ccreated_by%2Ccreated_at%2Cupdated_by%2Cupdated_at%2Cis_active"
                ."&columns_csv=id%2Cname%2Ccreated_by%2Ccreated_at%2Cupdated_by%2Cupdated_at%2Cis_active"
                ."&alias_columns_csv=Id%2CName%2CCreated+by%2CCreated+at%2CUpdated+by%2CUpdated+at%2CActive%3F"
                ."&rows_per_page=25";
        }

        return $report_url;
    }

    /**
     * Get report full url
     *
     * @return string
     */
    public function url()
    {
        $base_url = route('home');

        return $base_url.urldecode($this->parameters);
    }

    /**
     * Generates report url from id
     *
     * @param $id
     * @return string
     */
    public static function getReportUrlFromId($id)
    {
        if ($report = Report::remember(cacheTime('short'))->find($id)) {
            return $report->url().'&report_name='.$report->name;
        }

        return false;
    }

}