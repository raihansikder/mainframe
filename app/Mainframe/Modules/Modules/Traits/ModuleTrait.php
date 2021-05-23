<?php

namespace App\Mainframe\Modules\Modules\Traits;

use App\Module;
use App\ModuleGroup;

/** @mixin Module $this */
trait ModuleTrait
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getActiveList()
    {
        return Module::whereIsActive(1)->remember(timer('long'))->get();
    }

    /**
     * @param $name
     * @return mixed|\App\Module
     */
    public static function byName($name)
    {
        return Module::remember(timer('long'))
            ->where('name', $name)
            ->first();
    }

    /**
     * @param $class
     * @return Module|mixed
     */
    public static function byClass($class)
    {
        return Module::byName(Module::nameFromClass($class));
    }

    public static function fromController($classPath) // Todo: where is this used?
    {
        return lcfirst(str_replace('Controller', '', class_basename($classPath)));
    }

    /**
     * Get module names as one-dimensional array, by default get only the active ones
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

        $results = $q->remember(timer('long'))
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
            if (!$i) {
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
     * Returns a multi dimensional array with hierarchically stored module_groups and modules.
     * Unlike previous moduleTree() function, this one check the parent relationship with
     * module_group instead of module.
     *
     * @return array
     */
    public function moduleGroupTree()
    {
        $stack = [$this];
        for ($i = $this->module_group_id; ;) {
            if (!$i) {
                break;
            }
            if ($predecessor = ModuleGroup::remember(timer('long'))->find($i)) {
                $stack[] = $predecessor;
                $i = $predecessor->parent_id;
            }
        }
        $stack = array_reverse($stack);

        return $stack;
    }

    public static function ofGroupId($id = 0)
    {
        return Module::where('module_group_id', $id)
            ->where('is_active', 1)
            ->orderBy('order')
            ->orderBy('title')
            ->remember(timer('long'))
            ->get();
    }

    public static function modelNameFromTable($table)
    {
        return ucfirst(\Str::singular(\Str::camel($table)));
    }

    public static function rootModelNameFromTable($table)
    {
        return "\\App\\".Module::modelNameFromTable($table);
    }

    /**
     * super-heroes -> super_heroes
     *
     * @return string
     */
    public function tableName()
    {
        if ($this->module_table) {
            return $this->module_table;
        }

        return \Str::snake(\Str::camel($this->name));  // lorem-ipsums > loremIpsums > lorem_ipsums
    }

    public static function nameFromTable($table) // Todo: Need to check
    {

        return str_replace('_', '-', $table);
    }

    /**
     * @param $table
     * @return \App\Module|null
     */
    public static function fromTable($table)
    {
        return Module::where('module_table', $table)
            ->remember(timer('very-long'))
            ->first();
    }

    /**
     * Mainframe Module directory
     *
     * @return string
     */
    public function moduleClassDir()
    {
        if ($this->class_directory) {
            return $this->class_directory;
        }

        return 'app/Mainframe/Modules/'.$this->modelClassNamePlural();
    }

    /**
     * Mainframe Module Namespace
     *
     * @return string
     */
    public function moduleNameSpace()
    {
        if ($this->namespace) {
            return $this->namespace;
        }

        // Todo : Derive from moduleClassDir
        return '\App\Mainframe\Modules\\'.$this->modelClassNamePlural();
    }

    /**
     * returns super-heroes -> superHero
     *
     * @return string
     */
    public function elementName()
    {
        return \Str::singular(\Str::camel($this->name)); // lorem-ipsums > LoremIpsum
    }

    /**
     * returns super-heroes -> superHero
     *
     * @return string
     */
    public function collectionName()
    {
        return \Str::plural($this->elementName());
    }

    /**
     * Get the class name Superhero
     *
     * @return string
     */
    public function modelClassName()
    {
        return \Str::ucfirst($this->elementName());
    }

    /**
     * Get the class name Superhero
     *
     * @return string
     */
    public function modelClassNamePlural()
    {
        return \Str::plural($this->modelClassName());
    }

    /**
     * Returns full qualified calls path
     *
     * @return bool|mixed
     */
    public function modelClassPath()
    {
        $paths = [
            $this->model,                          // 1. Check for DB value
            //'\App\\'.$this->modelClassName(),    // 2. Check in Laravel App\ // Risky
            // $this->moduleNameSpace().'\\'.$this->modelClassName(), // Check in App\Mainframe\Modules
        ];

        foreach ($paths as $path) {
            if (class_exists($path)) {
                return $path;
            }
        }

        return null;
    }

    /**
     * Create instance of a model.
     *
     * @return mixed|\App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function modelInstance()
    {

        $classPath = $this->rootModelClassPath();

        // $classPath = $this->modelClassPath(); // Note: Now points to \App\Model.

        return (new $classPath);
    }

    public function rootModelClassPath()
    {
        return '\App\\'.class_basename($this->model);
    }

    public static function rootClass($class)
    {
        $module = new Module(['model' => $class]);

        return $module->rootModelClassPath();
    }

    /**
     * @return string|null
     */
    public function processorClassPath()
    {
        if ($this->processor) {
            return $this->processor;
        }

        return $this->moduleNameSpace().'\\'.$this->modelClassName().'Processor';
    }

    /**
     * Create instance of a model.
     *
     * @param $element
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|mixed
     */
    public function processorInstance($element)
    {
        $classPath = $this->processorClassPath();

        return (new $classPath($element));
    }

    /**
     * Get the class name Superhero
     *
     * @return string
     */
    public function controllerClassName()
    {
        return $this->modelClassName().'Controller';
    }

    /**
     * Returns full qualified calls path
     *
     * @return bool|mixed
     */
    public function controllerClassPath()
    {
        $paths = [
            $this->controller,                  // 1. Check for DB value
            '\App\Http\Controllers\Modules\\'.$this->controllerClassName(),    // 2. Check in Laravel App\
            $this->moduleNameSpace().'\\'.$this->controllerClassName(), // Check in App\Mainframe\Modules
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
    public function controllerInstance()
    {
        $classPath = $this->controllerClassPath();

        return new $classPath;
    }

    /**
     * Get module name from class name/path.
     *
     * @param $class
     * @return string
     */
    public static function nameFromClass($class)
    {
        return \Str::plural(\Str::kebab(class_basename($class)));
    }

    /**
     * Check if the specific module i.e. users is tenant enabled
     *
     * @return bool
     */
    public function tenantEnabled()
    {
        return $this->modelInstance()->hasTenantContext();
    }
}