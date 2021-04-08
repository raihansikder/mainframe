<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportViewProcessor;
use App\Mainframe\Helpers\Convert;
use Illuminate\Database\Query\Builder;
use View;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Exception;

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
            'path' => $this->path,
            'dataSource' => $this->dataSource,
            'columnOptions' => $this->columnOptions(),
        ];

        // Report prior to running
        if ($type !== 'blank') {
            $vars = array_merge($vars, [
                'selectedColumns' => $this->mutateSelectedColumns(),
                'aliasColumns' => $this->mutateAliasColumns(),
                'total' => $this->total(),
                'result' => $this->mutateResult(),
            ]);
        }

        $this->view = $this->viewProcessor();
        $vars['view'] = $this->view;

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
        return $this->view($this->viewPath($type))
            ->with($this->viewVars($type));
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

        $filename = ($this->fileName ?: 'Report '.now()).$ext;
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
}