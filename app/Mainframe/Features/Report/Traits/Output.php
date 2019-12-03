<?php

namespace App\Mainframe\Features\Report\Traits;

use View;
use Validator;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Exception;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Output
{
    /**
     * Show report blank or filled with data if 'Run'
     */
    public function show()
    {
        if (request('submit') != 'Run') {
            return $this->html($type = 'blank');
        }

        if ($this->invalid()) {
            return $this->response()->responseInvalid();
        }

        if ($this->output() == 'json') {
            return $this->json();
        }

        if ($this->output() == 'excel') {
            return $this->excel();
        }

        if ($this->output() == 'csv') {
            return $this->csv();
        }

        if ($this->output() == 'print') {
            return $this->html($type = 'print');
        }

        return $this->html();
    }

    public function responseInvalid()
    {
        $this->response()->fail();
        $this->response()->validator = $this->validator;

        if ($this->output() != 'json') {
            return $this->html($type = 'blank');
        }

        return $this->response()->json();
    }

    /**
     * Get result view path.
     *
     * @return string
     */
    public function resultViewPath()
    {
        return $this->path.'.result';
    }

    /**
     * Get result view path.
     *
     * @return string
     */
    public function resultPrintPath()
    {
        $path = $this->path.'.result-print';

        if (! View::exists($path)) {
            $path = 'mainframe.layouts.report.result-print';
        }

        return $path;
    }

    /**
     * @return mixed|\Illuminate\Support\Collection
     */
    public function json()
    {
        $result = $this->mutateResult()->toArray();
        $result['items'] = $result['data'];
        unset($result['data']);

        return $this->response()->success('Request Processed')
            ->load($result)->json();
    }

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

    public function csv()
    {
        return $this->excel($csv = true);
    }

    public function html($type = null)
    {
        $vars = [
            'path' => $this->path,
            'dataSource' => $this->dataSource,
            'columnOptions' => $this->columnOptions(),

        ];

        if ($type !== 'blank') {
            $vars = array_merge($vars, [
                'selectedColumns' => $this->mutateSelectedColumns(),
                'aliasColumns' => $this->mutateAliasColumns(),
                'total' => $this->total(),
                'result' => $this->mutateResult(),
            ]);
        }

        $path = $this->resultViewPath();
        if ($type == 'print') {
            $path = $this->resultPrintPath();
        }

        // $this->validator = \Validator::make([], []);
        // $this->validator()->messages()->add('test', 'test');

        // $this->response()->validator = $this->validator;

        return $this->response()->view($path)->with($vars);
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
        // Debugbar::disable();

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

        $filename = 'Report'.now().$ext;
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
    public function output()
    {
        if ($this->response()->expectsJson()) {
            return 'json';
        }

        return request('ret');
    }

    /**
     * Function changes result, show_column, aliasColumns for the final output
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function mutateResult()
    {
        $result = $this->result();
        // foreach ($result as $row) {
        //     $row->is_active = randomString();
        // }

        return $result;
    }

    public function validator()
    {
        if ($this->validator) {
            return $this->validator;
        }

        $this->validator = Validator::make([], []);

        // $this->addError( 'some');

        return $this->validator;
    }

}