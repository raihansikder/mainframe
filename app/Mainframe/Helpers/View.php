<?php

namespace App\Mainframe\Helpers;

class View extends \Illuminate\View\View
{

    /**
     * Renders the left menu of the application and makes the current item active based on breadcrumb
     *
     * @param        $tree
     * @param  string $currentModuleName
     * @param  array $breadcrumbs
     * @return null
     */
    public static function renderMenuTree($tree, $currentModuleName = '', $breadcrumbs = [])
    {
        if (! is_array($tree)) {
            return null;
        }
        foreach ($tree as $leaf) {
            $item       = $leaf['item'];
            $permission = $item->name.'-view-any'; //lorems-view-any

            if ($item->is_visible && user()->hasAnyAccess([$item->name, $permission])) {

                // 1. checks if an item has any children
                $hasChildren = isset($leaf['children']) && count($leaf['children']);
                // set tree view if there is children
                $liClass = $hasChildren ? 'treeview' : '';
                if (array_key_exists($item->name, $breadcrumbs)) {
                    $liClass .= " active";
                }
                // set url of the item
                $url = in_array($leaf['type'], ['module', 'module_group']) ? route($item->route_name.".index") : '#';

                // matching current breadcrumb of the application set an item as active

                echo "<li class='$liClass'>";
                echo "<a href=\"$url\"><i class=\"".$item->icon_css."\"></i><span>".$item->title."</span> ";
                if ($hasChildren) {
                    echo "<span class=\"pull-right-container\"> <i class=\"fa fa-angle-left pull-right\"></i> </span> ";
                }
                echo "</a>";

                // for children recursively draw the tree
                if ($hasChildren) {
                    echo "<ul class=\"treeview-menu\">";
                    View::renderMenuTree($leaf['children'], $currentModuleName, $breadcrumbs);
                    echo "</ul>";
                }
                echo "</li>";
            }
        }

    }

    /**
     * Returns an array with module/module_group name as key
     *
     * @param  \App\Mainframe\Modules\Modules\Module|null $module
     * @return array
     */
    public static function breadcrumb($module = null)
    {
        $breadcrumbs = [];
        if ($module) {
            $items = $module->moduleGroupTree();
            foreach ($items as $item) {
                $breadcrumbs[$item->name] = [
                    'name'  => $item->name,
                    'title' => $item->title,
                    'route' => "$item->name.index",
                    'url'   => route("$item->name.index"),
                ];
            }
        }

        return $breadcrumbs;
    }

}