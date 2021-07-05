<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportViewProcessor;
use App\Mainframe\Helpers\Convert;
use App\Report;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Str;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Output
{
    /**
     * Show report blank or filled with data if 'Run'
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Support\Collection|\Illuminate\View\View|mixed|void
     */
    public function output()
    {
        if (!$this->isValid()) {
            return $this->responseInvalid();
        }

        if ($this->outputType() == 'json') {
            return $this->json();
        }

        if ($this->outputType() == 'excel') {
            return $this->excel();
        }

        if ($this->outputType() == 'csv') {
            return $this->csv();
        }

        if ($this->outputType() == 'print') {
            return $this->html($type = 'print');
        }

        request()->merge([
            'columns_csv' => Convert::arrayToCsv($this->selectedColumns()),
            'alias_columns_csv' => Convert::arrayToCsv($this->aliasColumns()),
        ]);

        if (request('submit') != 'Run') {
            return $this->html($type = 'blank');
        }

        return $this->html();
    }

    /**
     * Run even if no submit=Run in URL
     *
     * @return $this
     */
    public function enableAutoRun()
    {
        request()->merge(['submit' => 'Run']);

        return $this;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function responseInvalid()
    {
        $this->fail();
        $this->response()->validator = $this->validator;

        if ($this->outputType() != 'json') {
            return $this->html($type = 'blank');
        }

        return $this->json();
    }

    /**
     * Get result view path.
     *
     * @return string
     */
    public function resultViewPath()
    {
        if (isset($this->resultViewPath)) {
            return $this->resultViewPath;
        }

        $paths = [
            $this->path.'.result',
            projectResources().'.layouts.report.result',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.result';

    }

    /**
     * Get result view path.
     *
     * @return string
     */
    public function resultPrintPath()
    {

        if (isset($this->resultViewPath)) {
            return $this->resultViewPath;
        }

        $paths = [
            $this->path.'.result-print',
            projectResources().'.layouts.report.result-print',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.result-print';

    }

    /**
     * @return array
     */
    public function jsonPayload()
    {
        $result = $this->mutateResult()->toArray();
        $result['items'] = $result['data'];
        unset($result['data']);

        return $result;
    }

    /**
     * @return mixed|\Illuminate\Support\Collection
     */
    public function json()
    {
        return $this->success('Request Processed')
            ->load($this->jsonPayload())->json();
    }

    /**
     * Download excel
     *
     * @param  bool  $csv
     * @return bool|void
     */
    public function excel($csv = false)
    {
        $selectedColumns = $this->mutateSelectedColumns();
        $aliasColumns = $this->mutateAliasColumns();
        $result = $this->mutateResult();

        try {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dumpExcel($selectedColumns, $aliasColumns, $result, $csv);
        } catch (Exception $e) {
            return setError($e->getMessage());
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            return setError($e->getMessage());
        }
    }

    /**
     * Download CSV
     *
     * @return bool|void
     */
    public function csv()
    {
        return $this->excel($csv = true);
    }

    public function viewVars($type = null)
    {
        $vars = [
            'path' => $this->path, // Older implementation
            'report' => $this,
            'columnOptions' => $this->columnOptions(),
            'view' => $this->viewProcessor(),
        ];

        // Report prior to running
        if ($type != 'blank') {
            $vars = array_merge($vars, [
                'selectedColumns' => $this->mutateSelectedColumns(),
                'aliasColumns' => $this->mutateAliasColumns(),
                'total' => $this->result()->total(),
                'result' => $this->mutateResult(),
            ]);
        }

        return array_merge($vars, $this->customViewVars());
    }

    /**
     * Additional view variables to pass to view blade
     *
     * @return array
     */
    public function customViewVars()
    {
        // $var = ['variable'=>'value'];
        // return $var;

        return [];
    }

    public function viewPath($type)
    {
        if ($type == 'print') {
            return $this->resultPrintPath();
        }

        return $this->resultViewPath();

    }

    /**
     * Output as HTML
     *
     * @param  null  $type  blank|print|null
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function html($type = null)
    {

        $vars = $this->viewVars($type);
        $path = $this->viewPath($type);

        return $this->response()->view($path, $vars);

    }

    /**
     * @param $selectedColumns
     * @param $aliasColumns
     * @param $result
     * @param  bool  $csv
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function dumpExcel($selectedColumns, $aliasColumns, $result, $csv = false)
    {
        \Debugbar::disable(); // Disable debugger. Because it add debug codes in output file.

        $ext = $csv ? '.csv' : '.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $ranges = $this->excelColumnRange(count($selectedColumns));

        /**
         * First column with title
         */
        $i = 0;
        foreach ($aliasColumns as $column) {
            $sheet->setCellValue($ranges[$i++]. 1, $column);
        }

        // Starting from A2
        $j = 2;
        foreach ($result as $row) {
            $k = 0;
            foreach ($selectedColumns as $column) {
                $sheet->setCellValue($ranges[$k++].$j, $row->$column);
            }
            $j++;
        }

        /** @noinspection DuplicatedCode */
        if ($csv) {
            $writer = new Csv($spreadsheet);
            $writer->setDelimiter(',');
            $writer->setEnclosure('');
            $writer->setLineEnding("\r\n");
            $writer->setSheetIndex(0);
        } else {
            $writer = new Xlsx($spreadsheet);
        }

        $filename = ($this->downloadFileName ?? 'Report-').now().$ext;
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $writer->save('php://output');
    }

    /**
     * Create column range for Excel
     *
     * @param $no_of_columns
     * @return array // ['A','B', ... 'AA', 'ZZ']
     */
    public function excelColumnRange($no_of_columns)
    {
        $letters = range('A', 'Z');

        $range = [];
        for ($i = 0; $i < $no_of_columns; $i++) {
            $position = $i * 26;
            foreach ($letters as $ii => $letter) {
                $position++;
                if ($position <= $no_of_columns) {
                    $range[] = ($position > 26 ? $range[$i - 1] : '').$letter;
                }
            }
        }

        return $range;
    }

    /**
     * Output type
     *
     * @return mixed
     */
    public function outputType()
    {
        if ($this->expectsJson()) {
            return 'json';
        }

        return request('ret') ?? 'html';
    }

    /**
     * Function changes result, show_column, aliasColumns for the final output
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     * @noinspection PhpUnnecessaryLocalVariableInspection
     */
    public function mutateResult()
    {
        $result = $this->result();
        // foreach ($result as $row) {
        //     $row->is_active = randomString();
        // }

        return $result;
    }

    /**
     * @return \App\Mainframe\Features\Report\ReportViewProcessor
     * @noinspection PhpUnnecessaryLocalVariableInspection
     */
    public function viewProcessor()
    {
        $view = new ReportViewProcessor($this);

        return $view;
    }

    /*---------------------------------
    | View/rendering related functions
    |---------------------------------*/

    /**
     * Path for filter blade
     *
     * @return string
     */
    public function filterPath()
    {

        if (isset($this->filterPath)) {
            return $this->filterPath;
        }

        $paths = [
            $this->path.'.filters',
            $this->path.'.includes.filters',
            projectResources().'.layouts.report.includes.filter',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.filter';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function initFunctionsPath()
    {
        if (isset($this->initFunctionsPath)) {
            return $this->initFunctionsPath;
        }

        $paths = [
            $this->path.'.init-functions',
            $this->path.'.includes.init-functions',
            projectResources().'.layouts.report.includes.init-functions',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.init-functions';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function ctaPath()
    {
        if (isset($this->ctaPath)) {
            return $this->ctaPath;
        }

        $paths = [
            $this->path.'.cta',
            $this->path.'.includes.cta',
            projectResources().'.layouts.report.includes.cta',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.cta';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function advancedFilterPath()
    {
        if (isset($this->ctaPath)) {
            return $this->ctaPath;
        }

        $paths = [
            $this->path.'.advanced',
            $this->path.'.includes.advanced',
            projectResources().'.layouts.report.includes.advanced',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.advanced';
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $value
     * @param  string|null  $moduleName
     * @return string|null
     * @deprecated use cell()
     */
    public function transformRow($column, $row, $value, $moduleName = null)
    {
        // linked to facility details page
        $newValue = $value;

        if (in_array($column, ['id', 'name'])) {
            if (isset($row->id) && $moduleName) {
                $newValue = "<a href='".route($moduleName.'.edit', $row->id)."'>".$value."</a>";
            }
        }

        return $newValue;
    }

    /**
     * Extracts the 'column' name part form 'table.column'
     *
     * @param $column
     * @return string
     */
    public function extractColumn($column)
    {
        if (Str::contains($column, ' as ')) {
            return trim(Str::after($column, ' as '));
        }

        if (Str::contains($column, '.')) {
            return Str::after($column, '.');
        }

        return $column;
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $route
     * @return string
     */
    public function cell($column, $row, $route = null)
    {
        $column = $this->extractColumn($column);

        if (!isset($row->$column)) {
            return null;
        }

        if (is_array($row->$column)) {
            return json_encode($row->$column);
        }

        // Add link
        if (in_array($column, ['id', 'name'])) {
            return $this->linkCell($column, $row, $route);
        }

        /*---------------------------------
        | Additional logic
        |---------------------------------*/

        return $row->$column;
    }

    public function linkCell($column, $row, $route = null)
    {
        if (!in_array($this->outputType(), ['html'])) {
            return $row->$column;
        }

        if (!$route) {
            $route = $this->elementViewUrl($row);
        }

        // Add link
        if ($route) {
            return "<a href='{$route}'>".$row->$column."</a>";
        }

        return $row->$column;

    }

    /**
     * Link to module element
     *
     * @param $row
     * @return string|null
     */
    public function elementViewUrl($row)
    {
        if (!$this->module) {
            return null;
        }

        if (!isset($row->id)) {
            return null;
        }

        return route($this->module->name.'.show', $row->id);
    }

    /**
     * Excel download URL
     *
     * @return string
     */
    public function excelDownloadUrl()
    {
        $requests = request()->all();
        $requests['ret'] = 'excel';

        return $this->buildUrl($requests);
    }

    /**
     * Report print URL
     *
     * @return string
     */
    public function printUrl()
    {
        $requests = request()->all();
        $requests['ret'] = 'print';

        return $this->buildUrl($requests);
    }

    public function jsonUrl()
    {
        $requests = request()->all();
        $requests['ret'] = 'json';

        return $this->buildUrl($requests);
    }

    /**
     * Save report URL
     *
     * @return string
     */
    public function saveUrl()
    {
        $url = route('reports.create');
        $params = [
            'title' => request('report_name'),
            'name' => request('report_name'),
            'parameters' => urlencode(str_replace(route('home'), '', \URL::full())),
        ];

        return $url.'?'.http_build_query($params);
    }

    /**
     * Save permission
     *
     * @return mixed
     */
    public function showSaveReportBtn()
    {
        return $this->user->can('create', Report::class);
    }

    /**
     * @param $index
     * @return string
     */
    public function columnTitle($index)
    {
        $report = $this;
        $alias = $report->mutateAliasColumns()[$index];
        $column = $this->extractColumn($report->mutateSelectedColumns()[$index]);

        $orderBy = request('order_by');
        $linkCss = '';

        if ($orderBy) {
            if (\Str::startsWith($orderBy, $column.' ASC')) {
                $orderBy = str_replace($column.' ASC', $column.' DESC', $orderBy);
                $icon = $this->sortAscIcon();
                $linkCss = 'btn btn-xs bg-red sort-btn';
            } elseif (\Str::startsWith($orderBy, $column.' DESC')) {
                $orderBy = str_replace($column.' DESC', $column.' ASC', $orderBy);
                $icon = $this->sortDescIcon();
                $linkCss = 'btn btn-xs bg-red sort-btn';
            } else {
                // $orderBy .= ','.$column.' DESC'; // For multiple sorting
                $orderBy = $column.' ASC';
                // $icon = $this->sortDefaultIcon();
                $icon = '';
            }
        } else {
            $orderBy = $column.' ASC';
            // $icon = $this->sortDefaultIcon();
            $icon = '';
        }

        $requests = request()->all();
        $requests['order_by'] = $orderBy;
        $url = $this->buildUrl($requests);

        return " <a class='{$linkCss}' href='{$url}'>$alias {$icon}</a>";
    }

    /**
     * Sort icon Asc
     *
     * @return string
     */
    public function sortAscIcon()
    {
        return "<i class='column-sort glyphicon glyphicon-sort-by-attributes'></i>";
    }

    /**
     * Sort icon Desc
     *
     * @return string
     */
    public function sortDescIcon()
    {
        return "<i class='column-sort glyphicon glyphicon-sort-by-attributes-alt'></i>";
    }

    /**
     * Default sort icon
     *
     * @return string
     */
    public function sortDefaultIcon()
    {
        return "<i class='column-sort glyphicon glyphicon-sort'></i>";
    }

    /**
     * Construct the full report url from request params
     *
     * @param  array  $params
     * @return string
     */
    public function buildUrl($params = [])
    {
        return \URL::current().'?'.http_build_query($params);
    }

}