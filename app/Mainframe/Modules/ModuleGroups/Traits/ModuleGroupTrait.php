<?php

namespace App\Mainframe\Modules\ModuleGroups\Traits;

use App\Module;
use App\ModuleGroup;

trait ModuleGroupTrait
{

    /**
     * Get Module-groups that are active
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getActiveList()
    {
        return ModuleGroup::whereIsActive(1)->remember(timer('long'))->get();
    }

    /**
     * Get Module-groups that are active
     *
     * @param  int  $id
     * @return \Illuminate\Support\Collection
     */
    public static function ofParentId($id = 0)
    {
        return ModuleGroup::whereParentId($id)->whereIsVisible(1)->whereIsActive(1)
            ->orderBy('order')->orderBy('title')->remember(timer('long'))->get();
    }

    /**
     * An array of menu
     *
     * @return array
     */
    public static function tree()
    {
        /** @var \App\ModuleGroup[] $moduleGroups */
        $moduleGroups = ModuleGroup::ofParentId(0);
        $list = [];
        foreach ($moduleGroups as $moduleGroup) {
            if (count($moduleGroup->children())) {
                $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => $moduleGroup->children()];
            } else {
                $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => []];
            }
        }
        $modules = Module::ofGroupId(0);
        if (count($modules)) {
            foreach ($modules as $module) {
                $list[] = ['type' => 'module', 'item' => $module];
            }
        }

        return $list;
    }

    /**
     * Get children modules and module_groups
     *
     * @return array
     */
    public function children()
    {
        $list = [];

        $moduleGroups = ModuleGroup::ofParentId($this->id);
        if (count($moduleGroups)) {
            /** @var \App\ModuleGroup $moduleGroups */
            foreach ($moduleGroups as $moduleGroup) {
                if (count($moduleGroup->children())) {
                    $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => $moduleGroup->children()];
                } else {
                    $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => []];
                }
            }
        }
        $modules = Module::ofGroupId($this->id);
        if (count($modules)) {
            foreach ($modules as $module) {
                $list[] = ['type' => 'module', 'item' => $module];
            }
        }

        return $list;
    }

    /**
     * Get module_group names as one-dimentional array
     *
     * @param  bool|true  $only_active
     * @return array
     */
    public static function names($only_active = true)
    {
        $q = ModuleGroup::select('name');
        if ($only_active) {
            $q = $q->remember(timer('very-long'))->where('is_active', 1);
        }
        $results = $q->get()->toArray();

        return array_column($results, 'name');
    }

    /**
     * get first level children of a module group
     *
     * @return array
     */
    public function firstLevelChildren()
    {
        $list = [];
        $moduleGroups = ModuleGroup::whereParentId($this->id)->whereIsActive(1)->orderBy('order')->remember(timer('very-long'))->get();
        if (count($moduleGroups)) {
            foreach ($moduleGroups as $moduleGroup) {
                $list[] = ['type' => 'module_group', 'item' => $moduleGroup];
            }
        }
        $modules = Module::whereModuleGroupId($this->id)->whereIsActive(1)->orderBy('order')->remember(timer('very-long'))->get();
        if (count($modules)) {
            foreach ($modules as $module) {
                $list[] = ['type' => 'module', 'item' => $module];
            }
        }

        return $list;
    }
}