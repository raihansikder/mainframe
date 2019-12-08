<?php
/**
 * Transforms the values of a cell. This is useful for creating links, changing colors etc.
 * @param        $column
 * @param        $row
 * @param        $value
 * @param string $moduleName
 * @return string
 */
function transformRow($column, $row, $value, $name = null)
{
    //linked to facility details page
    $new_value = $value;
    if (in_array($column, ['id', 'name'])) {
        if (isset($row->id) && $moduleName) {
            $new_value = "<a href='" . route($moduleName . '.edit', $row->id) . "'>" . $value . "</a>";
        }
    }
    return $new_value;
}

?>