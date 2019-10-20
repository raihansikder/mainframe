<?php

namespace App\Mainframe\Modules\Modules\Traits;

use App\ModuleGroup;
use App\Mainframe\Modules\Modules\Module;

trait Helpers
{

    public static function byName($name)
    {
        return Module::where('name', $name)->remember(cacheTime('long'))->first();
    }

    /**
     * Get module names as one-dimentional array, by default get only the active ones
     *
     * @param  bool|true  $only_active
     * @return array
     */
    public static function names($only_active = true)
    {
        $q = Module::select('name');
        if ($only_active) {
            $q = $q->where('is_active', 1);
        }
        $results = $q->remember(cacheTime('long'))->get()->toArray();
        $modules = array_column($results, 'name');

        return $modules;
    }

    /**
     * Function returns an array of predecessor module objects of a specific module.
     * This function is helpful to generate breadcrumb or menu.
     *
     * @return array
     */
    public function moduleTree()
    {
        $stack = [$this];
        for ($i = $this->parent_id; ;) {
            if (! $i) {
                break;
            }

            if ($predecessor = Module::find($i)) {
                $stack[] = $predecessor;
                $i       = $predecessor->parent_id;
            }
        }

        $stack = array_reverse($stack);

        return $stack;
    }

    /**
     * Returns a multi dimentional array with hiararchically stored module_groups and modules.
     * Unlike previous moduleTree() function, this one check the parent relationship with
     * module_group instead of module.
     *
     * @return array
     */
    public function moduleGroupTree()
    {
        $stack = [$this];
        for ($i = $this->module_group_id; ;) {
            if (! $i) {
                break;
            }
            if ($predecessor = ModuleGroup::remember(60)->find($i)) {
                $stack[] = $predecessor;
                $i       = $predecessor->parent_id;
            }
        }
        $stack = array_reverse($stack);

        return $stack;
    }
}