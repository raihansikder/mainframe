<?php

namespace App\Mainframe\Helpers;

class View
{

    /**
     * Renders the left menu of the application and makes the current item active based on breadcrumb
     *
     * @param        $tree
     * @param  string  $current_module_name
     * @param  array  $breadcrumbs
     * @return null
     */
    public static function renderMenuTree($tree, $current_module_name = '', $breadcrumbs = [])
    {
        if (is_array($tree)) {
            foreach ($tree as $leaf) {
                $p_name = "perm-".$leaf['type']."-".$leaf['item']->name;

                if (hasPermission($p_name)) {

                    // 1. checks if an item has any children
                    $has_children = false;
                    if (isset($leaf['children']) && count($leaf['children'])) {
                        $has_children = true;
                    }

                    // set tree view if there is children
                    $li_class = '';
                    if ($has_children) {
                        $li_class = 'treeview';
                    }

                    // set url of the item
                    $url = '#';
                    if (in_array($leaf['type'], ['module', 'module_group'])) {
                        $route = $leaf['item']->name.".index";
                        $url = route($route);
                    }

                    // matching current breadcrumb of the application set an item as active
                    if (array_key_exists($leaf['item']->name, $breadcrumbs)) {
                        $li_class .= " active";
                    }

                    echo "<li class='$li_class'>";
                    echo "<a href=\"$url\"><i class=\"".$leaf['item']->icon_css."\"></i><span>".$leaf['item']->title."</span> ";
                    if ($has_children) {
                        echo "<span class=\"pull-right-container\"> <i class=\"fa fa-angle-left pull-right\"></i> </span> ";
                    }
                    echo "</a>";

                    // for children recursively draw the tree
                    if ($has_children) {
                        echo "<ul class=\"treeview-menu\">";
                        View::renderMenuTree($leaf['children'], $current_module_name, $breadcrumbs);
                        echo "</ul>";
                    }
                    echo "</li>";
                }
            }

        }

        return null;
    }

    /**
     * Returns an array with module/module_group name as key
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|null  $module
     * @return array
     */
    public static function breadcrumb($module = null)
    {
        $breadcrumbs = [];
        if ($module) {
            $items = $module->moduleGroupTree();
            foreach ($items as $item) {
                $breadcrumbs[$item->name] = [
                    'name' => $item->name,
                    'title' => $item->title,
                    'route' => "$item->name.index",
                    'url' => route("$item->name.index"),
                ];
            }
        }

        return $breadcrumbs;
    }

}