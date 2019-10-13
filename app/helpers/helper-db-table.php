<?php

/**
 * todo: no solution for posgre
 * Function to check whether a database view exists
 *
 * @param $view
 * @return bool
 */
function dbViewExists($view)
{
    // $dbname = Config::get('database.connections.mysql.database');
    // $sql = "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE = 'VIEW' AND TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$view';";
    // $results = result($sql, cacheTime('long'));
    // if (count($results)) return true;
    return false;
}

/**
 * Function to check whether a database table exists
 *
 * @param array|string $table full table name with prefix
 * @return bool
 */
function dbTableExists($table)
{
    // $dbname = Config::get('database.connections.mysql.database');
    // $sql = "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table';";
    // $results = result($sql, cacheTime('long'));
    // if (count($results)) return true;
    // return false;

    return Cache::remember($table . ".hasTable", cacheTime('very-long'), function () use ($table) {
        return Schema::hasTable(prefixLess($table));
    });

}

/**
 * Strip prefix from table name
 *
 * @param $table
 * @return mixed
 */
function prefixLess($table)
{
    return str_replace(DB::getTablePrefix(), '', $table);
}

/**
 * Returns the database table column field names in an array. The parameter can be both string or array.
 *
 * @param array|string $table : table name excluding prefix. i.e. 'users'
 * @return array
 */
function columns($table)
{

    $columns = [];
    // Handle parameter as array/non array
    $tables = [];
    if (!is_array($table)) {
        array_push($tables, $table);
    } else {
        $tables = $table;
    }

    foreach ($tables as $table) {
        $table_columns = columsOfTable($table);

        $columns = array_merge($columns, $table_columns);
    }
    return $columns;
}

/**
 * Same as getTableFieldNamesFrmTable - implement SHOW COLUMN
 *
 * @param $table table name without prefix
 * @return array
 */
function columsOfTable($table)
{
    // $fieldNames = [];
    // $sql = "SHOW COLUMNS FROM `$table_name`";
    // $results = result($sql, $timeout = cacheTime('long'));    //$results = DB::select(DB::raw($sql));
    // foreach ($results as $result) {
    //     array_push($fieldNames, $result->Field);
    // }

    return Cache::remember($table . ".columsOfTable", cacheTime('very-long'), function () use ($table) {
        return Schema::getColumnListing($table);
    });

}

/**
 * Returns the database table column field names in an array.
 * There exists a columns function that can returns fields
 * of a single table or multple tables if passes as array
 *
 * @param $table : table name excluding prefix. i.e. 'users'
 * @return array
 */
function fields($table)
{
    return columns($table);
}

/**
 * Adds prefix to a table name. This is useful for raw query. Laravel by default does not
 * require table prefix.
 *
 * @param $table : table name without prefix
 * @return string Table name with prefix added
 */
function dbTable($table)
{

    if (dbViewExists($table)) return $table;
    else if (dbTableExists($table)) return $table;

    $table_prefix = DB::getTablePrefix();
    // Checks if table name already has prefix.
    if (strlen($table_prefix) && strpos($table, $table_prefix) !== false) {
        return $table;
    }

    // If no prefix is added then a string is returned by adding a prefix.
    return $table_prefix . $table;
}

/**
 * @param       $Model
 * @param array $except // Todo : adding $except returns a different kind of array.
 * @return array
 * @internal param type $table i.e facilities without table prefix
 */
function getModelFields($Model, $except = [])
{
    $except = [];
    return array_diff(columns(modelTable($Model)), $except);
}

/**
 * Checks if a field exists in a table
 *
 * @param string $table
 * @param string $column
 * @return bool
 */
function tableHasColumn($table, $column)
{
    if (in_array($column, columns($table))) return true;
    return false;
}

/**
 * get the table name(with prefix) used by a model
 *
 * @param string $Model
 * @return string
 */
function modelTable($Model)
{
    return DB::getTablePrefix() . str_plural(lcfirst($Model));
}
