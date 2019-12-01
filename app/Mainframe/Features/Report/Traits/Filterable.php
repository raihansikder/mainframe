<?php

namespace App\Mainframe\Features\Report\Traits;

use Illuminate\Support\Str;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Filterable
{

    /**
     * @param $query   \Illuminate\Database\Query\Builder
     * @return mixed
     */
    public function filter($query)
    {
        /** @var array $escape_fields */
        $escape_fields = $this->defaultFilterEscapeFields(); // Default filter logic will not apply on these

        $requests = request()->all();

        foreach ($requests as $field => $val) {
            if (in_array($field, $escape_fields)) {
                $query = $this->customFilterOnEscapedFields($query, $field, $val);
            } else {
                $query = $this->defaultFilter($query, $field, $val);
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
     * @param $field
     * @param $val
     * @return mixed
     */
    public function customFilterOnEscapedFields($query, $field, $val)
    {
        // if($field == 'some_name'){
        //     $query = $query->where($field,strtok($val));
        // }
        return $query;
    }

    /**
     * Default query builder from input.
     *
     * @param $query \Illuminate\Database\Query\Builder
     * @param $field
     * @param $val
     * @return mixed
     */
    public function defaultFilter($query, $field, $val)
    {
        // The input field name matches a data source field name.
        if ($this->fieldExists($field)) {
            // Input is array
            if ($this->paramIsArray($val)) {
                if ($this->possibleJson($field)) { // Data stored in table is possibly json
                    // $query = $query->whereJsonContains($field, $val); // Does't work for older maria db
                } else { // Not json. A single value.
                    $query = $query->whereIn($field, $this->cleanArray($val));
                }
            } else {
                if ($this->paramIsCsv($val)) { // Input is CSV

                    $query = $query->whereIn($field, $this->csvToArray($val));
                } else {
                    if ($this->paramIsString($val) && strlen(trim($val))) { // Input is string

                        if ($val == 'null') {
                            $query = $query->whereNull($field);
                        } else {
                            if ($this->columnIsFullText($field)) { // Substring search. Good for name, email etc.
                                $query = $query->where($field, 'LIKE', '%'.trim($val).'%');
                            } else { // Exact string match
                                $query = $query->where($field, trim($val));
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
        if (($this->isFromRange($field) || $this->isToRange($field)) && strlen($val)) {
            $actual_column = $this->getActualDateField($field);

            if ($this->isFromRange($field)) {
                $query = $query->where($actual_column, '>=', trim($val));
            } else {
                if ($this->isToRange($field)) {
                    $query = $query->where($actual_column, '<=', trim($val));
                }
            }
        }

        return $query;
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

    public function possibleJson($field)
    {
        if (Str::contains($field, ['_ids', '_json'])) {
            return true;
        }

        return false;
    }

    /**
     * Checks if a column exists in data source.
     *
     * @param $field
     * @return bool
     */
    public function fieldExists($field)
    {
        return in_array($field, $this->dataSourceColumns());
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
     * @param $field
     * @return bool
     */
    public function isFromRange($field)
    {
        if (Str::contains($field, ['_from', '_start', '_starts', '_min'])) {
            return true;
        }

        return false;
    }

    /**
     * From the name of the input try to assume if it is some data-to field
     *
     * @param $field
     * @return bool
     */
    public function isToRange($field)
    {
        if (Str::contains($field, ['_to', '_till', '_end', '_ends', '_max'])) {
            return true;
        }

        return false;
    }

    /**
     * Checks if the input field is date format
     *
     * @param $field
     * @return bool
     */
    public function columnLooksLikeDateField($field)
    {
        if (Str::contains($field, ['_at', 'on', 'date'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the actual date field
     *
     * @param $field
     * @return string
     */
    public function getActualDateField($field)
    {
        $replaces = [
            '_from', '_start', '_starts',
            '_to', '_till', '_end', '_ends'
        ];

        $actual = $field;
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
        return request('additional_conditions');
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
}