<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Modules\Modules\ModuleGroup;
use Illuminate\Support\Str;

trait ModuleHelper
{
    /**
     * returns super-heroes -> superHero
     *
     * @return string
     */
    public function elementName()
    {
        /** @var \App\Mainframe\Modules\Modules\Module|self $this */
        return Str::singular(Str::camel($this->name));
    }

    /**
     * returns super-heroes -> superHero
     *
     * @return string
     */
    public function elementNamePlural()
    {
        /** @var \App\Mainframe\Modules\Modules\Module|self $this */
        return Str::plural($this->elementName());
    }

    /**
     * super-heroes -> super_heroes
     *
     * @return string
     */
    public function tableName()
    {
        /** @var \App\Mainframe\Modules\Modules\Module $this */
        return Str::snake(Str::camel($this->name));
    }

    /**
     * Mainframe Module Namespace
     *
     * @return string
     */
    public function moduleNameSpace()
    {
        return 'App\Mainframe\Modules\\'.$this->modelClassNamePlural();
    }

    /**
     * Mainframe Module Namespace
     *
     * @return string
     */
    public function moduleClassDir()
    {
        return 'app/Mainframe/Modules/'.$this->modelClassNamePlural();
    }

    public function validatorClassPath()
    {
        return $this->moduleNameSpace().'\\'.$this->modelClassName().'Validator';
    }

    /**
     * Returns full qualified calls path
     *
     * @return bool|mixed
     */
    public function modelClassPath()
    {
        $paths = [
            $this->model,                       // 1. Check for DB value
            'App\\'.$this->modelClassName(),    // 2. Check in Laravel App\
            $this->moduleNameSpace().'\\'.$this->modelClassName(), // Check in App\Mainframe\Modules
        ];

        foreach ($paths as $path) {
            if (class_exists($path)) {
                return $path;
            }
        }

        return false;
    }

    /**
     * Create instance of a model.
     *
     * @return mixed
     */
    public function modelInstance()
    {
        $classPath = $this->modelClassPath();

        return new $classPath;
    }

    /**
     * Create instance of a model.
     *
     * @param $element
     * @return mixed
     */
    public function validatorInstance($element)
    {
        $classPath = $this->validatorClassPath();

        return new $classPath($element);
    }

    /**
     * Get the class name Superhero
     *
     * @return string
     */
    public function modelClassName()
    {
        return Str::ucfirst($this->elementName());
    }

    /**
     * Get the class name Superhero
     *
     * @return string
     */
    public function modelClassNamePlural()
    {
        return Str::plural($this->modelClassName());
    }

    public static function byName($name)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return self::where('name', $name)
            ->remember(cacheTime('long'))
            ->first();
    }

    public static function fromController($classPath)
    {
        return lcfirst(str_replace('Controller', '', class_basename($classPath)));
    }

    /**
     * Get module names as one-dimentional array, by default get only the active ones
     *
     * @param  bool|true  $only_active
     * @return array
     */
    public static function names($only_active = true)
    {
        $q = self::select('name');
        if ($only_active) {
            $q = $q->where('is_active', 1);
        }
        /** @noinspection PhpUndefinedMethodInspection */
        $results = $q->remember(cacheTime('long'))
            ->get()->toArray();

        return array_column($results, 'name');
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

            if ($predecessor = self::find($i)) {
                $stack[] = $predecessor;
                $i = $predecessor->parent_id;
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
            if ($predecessor = ModuleGroup::remember(cacheTime('long'))->find($i)) {
                $stack[] = $predecessor;
                $i = $predecessor->parent_id;
            }
        }
        $stack = array_reverse($stack);

        return $stack;
    }

    public static function ofGroupId($id = 0)
    {
        return Module::whereModuleGroupId($id)
            ->active(1)->orderBy('order')
            ->remember(cacheTime('long'))
            ->get();
    }
}