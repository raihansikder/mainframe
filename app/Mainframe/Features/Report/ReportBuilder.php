<?php

namespace App\Mainframe\Features\Report;

use DB;
use View;
use Cache;
use Schema;
use Illuminate\Support\Str;
use Illuminate\Database\Query\Builder;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use App\Mainframe\Features\Modular\BaseController\MainframeBaseController;

class ReportBuilder extends MainframeBaseController
{

    /** @var  string DB Table/View names */
    public $dataSource;

    /** @var  string Directory location of the report blade templates */
    public $baseDir;

    /** @var  string Directory location of the default report blade templates */
    public $defaultBaseDir = 'modules.base.report';

    /** @var int Cache time */
    public $cache;

    /** @var array */
    public $dataSourceColumns;

    /** @var array */
    public $showColumnsOptions;

    /** @var  Builder */
    public $query;

    /** @var  integer total count */
    public $total;

    /** @var  \Illuminate\Support\Collection Report results */
    public $results;

    /**
     * ReportBuilder constructor.
     *
     * @param  string  $dataSource
     * @param  string  $baseDir
     * @param  int  $cache
     */
    public function __construct($dataSource = null, $baseDir = null, $cache = 0)
    {
        parent::__construct();

        $this->dataSource = $dataSource;
        $this->baseDir = $baseDir ?? 'mainframe.layouts.report';
        $this->cache = $cache;
        $this->dataSourceColumns = $this->dataSourceColumns();
        $this->showColumnsOptions = $this->showColumnsOptions();
    }

    /**
     * Get the data source field|columns names
     *
     * @return mixed|null
     */
    public function dataSourceColumns()
    {
        if ($this->dataSource) {
            return Cache::remember('columns-of:'.$this->dataSource, cacheTime('very-long'), function () {
                return Schema::getColumnListing($this->dataSource);
            });
        }

        return [];
    }

    /**
     * Show this in a selection option in the front-end
     *
     * @return array
     */
    public function showColumnsOptions()
    {
        return array_merge($this->dataSourceColumns(), $this->ghostSelectColumns());
    }

    /**
     * Some times we need to pass column names that do not exists in the model/table.
     * This should not be considered in query building. Rather we want this to be
     * post processed in mutation function.
     *
     * @return array
     */
    public function ghostSelectColumns()
    {
        return [];
    }

    /**
     * Show report blank or filled with data if 'Run'
     */
    public function show()
    {
        $baseDir = $this->baseDir;
        $dataSource = $this->dataSource;
        $dataSourceColumns = $this->dataSourceColumns();
        $showColumnsOptions = $this->showColumnsOptions();

        if (request('submit') != 'Run') {
            return view($this->resultsViewPath())
                ->with(compact('baseDir', 'dataSource', 'dataSourceColumns', 'showColumnsOptions'));
        }

        $showColumns = $this->mutateShowColumns($this->showColumns());
        $aliasColumns = $this->mutateAliasColumns($this->aliasColumns());
        $results = $this->mutateResults($this->results());
        $total = $this->total();

        if ($this->output() === 'json') {
            return $results;
        }

        if ($this->output() === 'excel') {
            try {
                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dumpExcel($showColumns, $aliasColumns, $results);
            } catch (Exception $e) {
                return setError($e->getMessage());
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                return setError($e->getMessage());
            }
        }

        if ($this->output() === 'print') {
            return view($this->resultsPrintPath())
                ->with(compact('showColumns', 'aliasColumns', 'total', 'results', 'baseDir', 'dataSource',
                    'dataSourceColumns', 'showColumnsOptions'));
        }

        return view($this->resultsViewPath())
            ->with(compact('showColumns', 'aliasColumns', 'total', 'results', 'baseDir', 'dataSource',
                'dataSourceColumns', 'showColumnsOptions'));

    }

    /**
     * This function gives and option to modify $showColumns array for output.
     * $showColumns array has the initial column names from the SQL query results.
     * These columns are finally printed in report out put.
     *
     * @param $showColumns
     * @return array
     */
    public function mutateShowColumns($showColumns)
    {
        $merge = [];

        if ($this->groupByFields()) {
            $merge = array_merge($merge, $this->additionalShowColumnsDueToGroupBy());
        }

        return array_merge($showColumns, $merge);
    }

    /**
     * Convert input csv to array
     *
     * @return array
     */
    public function showColumns()
    {
        $keys = $this->dataSourceColumns();

        if (strlen($this->showColumnsCsv())) {
            $keys = $this->cleanArray(explode(',', $this->showColumnsCsv()));
        }

        return $keys;
    }

    /**
     * Convert input csv to array
     *
     * @return mixed
     */
    public function showColumnsCsv()
    {
        return $this->cleanCsv(request('show_columns_csv') ?? null);
    }

    /**
     * cleans a string and returns as csv
     *
     * @param $csv
     * @return string
     */
    protected function cleanCsv($csv)
    {
        if ($csv == null) {
            return null;
        }

        // $clearChars = array("\n", " ", "\r");
        $clearChars = ["\n", "\r"];

        return str_replace($clearChars, '', trim($csv, ', '));
    }

    /**
     * Remove empty values and arrays values from an array.
     *
     * @param  array  $array
     * @return array
     */
    protected function cleanArray($array = [])
    {
        $temp = [];
        if (is_array($array) && count($array)) {                    // handle if input is an array1
            foreach ($array as $a) {
                if (! is_array($a) && strlen(trim($a))) {
                    $temp[] = $a;
                }
            }
        }

        return $temp;
    }

    /**
     * Change alias column array for output
     *
     * @param $aliasColumns
     * @return array
     */
    public function mutateAliasColumns($aliasColumns)
    {
        $merge = [];

        if ($this->groupByFields()) {
            $merge = array_merge($merge, $this->additionalAliasColumnsDueToGroupBy());
        }

        return array_merge($aliasColumns, $merge);
    }

    /**
     * This function returns an array of Titles/Column aliases that are mapped with
     * each $showColumns. This usually comes from the inputs as CSV.
     * If no input found then this arrays is constructed based on $showColumns.
     *
     * @return array
     */
    public function aliasColumns()
    {
        if (strlen($this->aliasColumnsCsv())) {
            $keys = $this->cleanArray(explode(',', $this->aliasColumnsCsv()));
        } else {
            $keys = $this->showColumns();
        }

        if (count($keys) <= count($this->showColumns())) {
            $keys = $this->fillAliasColumns($keys);
        }

        if (count($keys) > count($this->showColumns())) {
            $keys = array_slice($keys, count($this->showColumns()));
        }

        return $keys;
    }

    /**
     * Get column as csv and clean
     *
     * @return mixed
     */
    public function aliasColumnsCsv()
    {
        return $this->cleanCsv(request('alias_columns_csv') ?? null);
    }

    public function fillAliasColumns($keys)
    {
        $sliced = array_slice($this->showColumns(), count($keys));

        $keys = array_merge($keys, $sliced);

        $temp = [];
        foreach ($keys as $key) {
            $temp[] = Str::title(str_replace('_', ' ', $key));
        }

        return $temp;
    }

    /**
     * Function changes results, show_column, aliasColumns for the final output
     *
     * @param $results
     * @return mixed
     */
    public function mutateResults($results)
    {
        // foreach ($results as $row) {
        //     $row->new = randomString();
        // }
        return $results;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function results()
    {
        $query = $this->queryResults();

        if (in_array($this->output(), ['excel', 'print'])) {
            return $query->get();
        }

        if ($this->rowsPerPage()) {
            return $query->paginate($this->rowsPerPage());
        }

        return $query->get();
    }

    public function json()
    {
        return $this->results();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function queryResults()
    {
        /** @var Builder $query */
        $query = $this->selectDataSource();
        if (count($this->selectColumns())) {
            $query = $query->select($this->selectColumns());
        }
        $query = $this->filters($query);
        $query = $this->groupBy($query);
        $query = $this->orderBy($query);

        return $query;
    }

    /**
     * Query select table
     *
     * @return \Illuminate\Database\Query\Builder||\Illuminate\Database\Eloquent\Builder
     */
    public function selectDataSource()
    {
        return DB::table($this->dataSource());
    }

    /**
     * Generate the data source name that can be used in query string.
     *
     * @return string
     */
    public function dataSource()
    {
        return $this->dataSource;
    }

    /**
     * Convert input csv to array
     *
     * @return array
     */
    public function selectColumns()
    {
        if (strlen($this->selectColumnsCsv())) {
            $keys = $this->cleanArray(explode(',', $this->selectColumnsCsv()));
        } else {
            if (count($this->showColumns())) {
                $keys = $this->showColumns();
                $keys = $this->addAlwaysSelectColumns($keys);
                $keys = $this->removeGhostShowColumns($keys);
                //dd($keys);

            } else {
                $keys = $this->dataSourceColumns();
            }
        }

        $keys = $this->addGroupBySelect($keys);

        return $keys;
    }

    /**
     * Get the direct user input CSV
     *
     * @return string|null
     */
    public function selectColumnsCsv()
    {
        return $this->cleanCsv(request('select_columns_csv'));
    }

    /**
     * Add the columns that should be always selected.
     *
     * @param  array  $keys
     * @return array
     */
    public function addAlwaysSelectColumns($keys = [])
    {
        foreach ($this->alwaysSelectColumns() as $col) {
            if (! in_array($col, $keys)) {
                if (in_array($col, $this->dataSourceColumns)) {
                    $keys[] = $col;
                }
            }
        }

        return $keys;
    }

    /**
     * Columns that should be always included in the select column query.
     * Usually this is id field. This is useful to generate a url
     * to the linked element.
     *
     * @return array
     */
    public function alwaysSelectColumns()
    {
        return ['id'];
    }

    /**
     * Remove ghost columns from the array of select columns.
     *
     * @param  array  $keys
     * @return array
     */
    public function removeGhostShowColumns($keys = [])
    {
        $temp = [];
        foreach ($keys as $key) {
            if (! in_array($key, $this->ghostSelectColumns())) {
                $temp[] = $key;
            }
        }

        return $temp;
    }

    /**
     * @param $query   \Illuminate\Database\Query\Builder
     * @return mixed
     */
    public function filters($query)
    {
        /** @var array $escape_fields */
        $escape_fields = $this->defaultFilterEscapeFields(); // Default filter logic will not apply on these

        $requests = request()->all();

        foreach ($requests as $name => $val) {
            if (in_array($name, $escape_fields)) {
                $query = $this->customFilterOnEscapedFields($query, $name, $val);
            } else {
                $query = $this->defaultFilter($query, $name, $val);
            }
        }

        if ($this->additionalFilterConditions()) {
            $query = $query->whereRaw($this->additionalFilterConditions());
        }

        if (in_array('deleted_at', $this->dataSourceColumns())) {
            $query = $query->whereNull('deleted_at');
        }

        return $query;
    }

    /**
     * Some filters needs to escaped from default handling and used for custom query
     * generation.
     *
     * @return array
     */
    public function defaultFilterEscapeFields()
    {
        return [];
    }

    /**
     * Custom query for escaped filter fields.
     *
     * @param $query \Illuminate\Database\Query\Builder
     * @param $name
     * @param $val
     * @return mixed
     */
    public function customFilterOnEscapedFields($query, $name, $val)
    {
        // if($name == 'some_name'){
        //     $query = $query->where($name,strtok($val));
        // }
        return $query;
    }

    /**
     * Default query builder from input.
     *
     * @param $query \Illuminate\Database\Query\Builder
     * @param $name
     * @param $val
     * @return mixed
     */
    public function defaultFilter($query, $name, $val)
    {
        // The input field name matches a data source field name.
        if ($this->columnInDataSource($name)) {
            // Input is array
            if ($this->paramIsArray($val)) {
                if ($this->possibleJson($name)) { // Data stored in table is possibly json
                    // $query = $query->whereJsonContains($name, $val); // Does't work for older maria db
                } else { // Not json. A single value.
                    $query = $query->whereIn($name, $this->cleanArray($val));
                }
            } else {
                if ($this->paramIsCsv($val)) { // Input is CSV

                    $query = $query->whereIn($name, $this->csvToArray($val));
                } else {
                    if ($this->paramIsString($val) && strlen(trim($val))) { // Input is string

                        if ($val == 'null') {
                            $query = $query->whereNull($name);
                        } else {
                            if ($this->columnIsFullText($name)) { // Substring search. Good for name, email etc.
                                $query = $query->where($name, 'LIKE', '%'.trim($val).'%');
                            } else { // Exact string match
                                $query = $query->where($name, trim($val));
                            }
                        }
                    }
                }
            }
        }

        /**
         * If there is some field like created_at_from, end_date_from then
         * the builder smartly handles it to create a date range query.
         */
        if (($this->isFromRange($name) || $this->isToRange($name)) && strlen($val)) {
            $actual_column = $this->getActualDateField($name);

            if ($this->isFromRange($name)) {
                $query = $query->where($actual_column, '>=', trim($val));
            } else {
                if ($this->isToRange($name)) {
                    $query = $query->where($actual_column, '<=', trim($val));
                }
            }
        }

        return $query;
    }

    /**
     * Checks if a column exists in data source.
     *
     * @param $name
     * @return bool
     */
    public function columnInDataSource($name)
    {
        return in_array($name, $this->dataSourceColumns());
    }

    /**
     * Check if a filter parameter has array value
     *
     * @param $input
     * @return bool|int
     */
    public function paramIsArray($input)
    {
        if (is_array($input) && count($input)) {
            return count($this->cleanArray($input));
        }

        return false;
    }

    public function possibleJson($name)
    {
        if (Str::contains($name, ['_ids', '_json'])) {
            return true;
        }

        return false;
    }

    /**
     * Check if param is csv
     *
     * @param $input
     * @return bool|int
     */
    public function paramIsCsv($input)
    {
        if (strlen($input) && strpos($input, ',') !== false) {
            return strlen($this->cleanCsv($input));
        }

        return false;
    }

    /**
     * Convert CSV to array.
     */
    public function csvToArray($csv)
    {
        return $this->cleanArray(explode(',', $this->cleanCsv($csv)));
    }

    /**
     * Check if param is string.
     *
     * @param $input
     * @return string
     */
    public function paramIsString($input)
    {
        return trim(strlen($input));
    }

    /**
     * Check if a column is for full text search. These will be processed with %LIKE%
     *
     * @param $column
     * @return bool
     */
    public function columnIsFullText($column)
    {
        $full_text_columns = ['name'];

        return in_array($column, $full_text_columns);
    }

    /**
     * From the name of the input try to assume if it is some data-from field
     *
     * @param $name
     * @return bool
     */
    public function isFromRange($name)
    {
        if (Str::contains($name, ['_from', '_start', '_starts', '_min'])) {
            return true;
        }

        return false;
    }

    /**
     * From the name of the input try to assume if it is some data-to field
     *
     * @param $name
     * @return bool
     */
    public function isToRange($name)
    {
        if (Str::contains($name, ['_to', '_till', '_end', '_ends', '_max'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the actual date field
     *
     * @param $name
     * @return string
     */
    public function getActualDateField($name)
    {
        $replaces = [
            '_from', '_start', '_starts',
            '_to', '_till', '_end', '_ends'
        ];

        $actual = $name;
        foreach ($replaces as $replace) {
            $actual = Str::replaceLast($replace, '', $actual);
        }

        return $actual;
    }

    /**
     * Additional filters
     *
     * @return mixed
     */
    public function additionalFilterConditions()
    {
        return request('additional_conditions') ?? null;
    }

    /**
     * @param $query Builder
     * @return \Illuminate\Database\Query\Builder
     */
    public function orderBy($query)
    {
        $order_by_raw = trim(request('order_by') ?? null);
        if (strlen($order_by_raw)) {
            $query = $query->orderByRaw($order_by_raw);
        }

        return $query;
    }

    /**
     * Determine the group by field field names. Usually this is input
     * from the report generator form.
     *
     * @return array
     */
    public function groupByFields()
    {
        return $this->csvToArray(request('group_by') ?? null);
    }

    /**
     * Add groupBy clause to the query builder.
     *
     * @param $query Builder
     * @return \Illuminate\Database\Query\Builder
     */
    public function groupBy($query)
    {
        $group_bys = $this->groupByFields();
        if ($group_bys) {
            $query = $query->groupBy($group_bys);
        }

        return $query;
    }

    /**
     * Output type
     *
     * @return mixed
     */
    public function output()
    {
        return request('ret') ?? null;
    }

    /**
     * Rows per page. If grouped then show all rows.
     *
     * @return mixed
     */
    public function rowsPerPage()
    {
        // For groupBy query show all in one page
        if ($this->groupByFields()) {
            return $this->total();
        }

        return request('rows_per_page') ?? null;
    }

    /**
     * Get total number of rows
     *
     * @return int
     */
    public function total()
    {
        return $this->queryTotal()->count();
    }

    public function queryTotal()
    {
        $query = $this->selectDataSource();
        $query = $this->filters($query);

        return $query;
    }

    /**
     * @param $showColumns
     * @param $aliasColumns
     * @param $results
     * @param  bool  $csv
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function dumpExcel($showColumns, $aliasColumns, $results, $csv = false)
    {
        // Debugbar::disable();

        $ext = $csv ? '.csv' : '.xlsx';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $ranges = $this->excelColumnRange(count($showColumns));

        /**
         * First column with title
         */
        $i = 0;
        foreach ($aliasColumns as $column) {
            $sheet->setCellValue($ranges[$i++]. 1, $column);
        }

        // Starting from A2

        $j = 2;
        foreach ($results as $row) {
            $k = 0;
            foreach ($showColumns as $column) {
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
     * Get result view path.
     *
     * @return string
     */
    public function resultsPrintPath()
    {
        $print_path = $this->baseDir.'.results-print';
        if (! View::exists($print_path)) {
            $print_path = $this->defaultBaseDir.'.results-print';
        }

        return $print_path;
    }

    /**
     * Get result view path.
     *
     * @return string
     */
    public function resultsViewPath()
    {
        return $this->baseDir.'.results';
    }

    /**
     * Checks if the input field is date format
     *
     * @param $name
     * @return bool
     */
    public function columnLooksLikeDateField($name)
    {
        if (Str::contains($name, ['_at', 'on', 'date'])) {
            return true;
        }

        return false;
    }

    /**
     * Run the query to get the results.
     * Run results and store the values.
     */
    public function run()
    {
        $this->total = $this->total();
        $this->results = $this->results();
    }

    /**
     * Check if a column exist in data source
     *
     * @param $column
     * @return bool
     */
    protected function columnIsInDataSource($column)
    {
        return in_array($column, $this->dataSourceColumns);
    }

    /**
     * removes new line tabs etc( '\n','\t') from a string
     * remove-extra-spaces-tabs-and-line-feeds-from-a-sentence-and-substitute
     *
     * @param $str
     * @return mixed
     */
    protected function cleanString($str)
    {
        return preg_replace('/\s+/S', ' ', $str);
    }

    /**********************************************************************************
     * Custom group by reports.
     *********************************************************************************/

    /**
     * Adds the custom COUNT/SUM column in SQL SELECT.
     *
     * @param  array  $keys
     * @return array
     */
    public function addGroupBySelect($keys = [])
    {
        if ($this->groupByFields()) {
            $keys[] = DB::raw('count(*) as total');
        }

        return $keys;
    }

    /**
     * Due to existence of a group by clause some additional column
     * needs to be shown. This function returns the array of those additional columns.
     *
     * @return array
     */
    public function additionalShowColumnsDueToGroupBy()
    {
        // considering COUNT(*) as total exists in the query builder. However this
        // doesn't always have to be total. For example it can be sum if there
        // query has SUM(*) as sum
        return ['total'];
        //$merge[] = 'sum';
    }

    /**
     * Due to existence of a group by clause some additional alias columns are required
     * this array maps with the additionalShowColumnsDueToGroupBy.
     * `@return array
     */
    public function additionalAliasColumnsDueToGroupBy()
    {
        // considering COUNT(*) as total exists in the query builder. However this
        // doesn't always have to be total. For example it can be sum if there
        // query has SUM(*) as sum
        return ['Total'];
        //$merge[] = 'sum';
    }
}