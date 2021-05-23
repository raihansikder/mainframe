<?php
// /**
//  * Transforms the values of a cell. This is useful for creating links, changing colors etc.
//  * @param        $column
//  * @param        $row
//  * @param        $value
//  * @param string $module_name
//  * @return string
//  */
// function transform($column, $row, $value, $module_name = null)
// {
//     //linked to facility details page
//     $new_value = $value;
//     if (in_array($column, ['id', 'name'])) {
//         if (isset($row->id) && $module_name) {
//             $new_value = "<a href='".route($module_name.'.edit', $row->id)."'>".$value."</a>";
//         }
//     }
//
//     return $new_value;
// }

?>