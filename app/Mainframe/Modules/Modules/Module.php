<?php

namespace App\Mainframe\Modules\Modules;

use App\ModuleGroup;
use Illuminate\Support\Str;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModule;

class Module extends BaseModule
{

    protected $fillable = [
        'name', 'title', 'description', 'parent_id', 'module_group_id', 'level',
        'order', 'color_css', 'icon_css', 'default_route', 'is_active', 'created_by',
        'updated_by', 'deleted_by', 'model', 'view', 'controller'
    ];

    /**
     * Automatic eager load relation by default (can be expensive)
     *
     * @var array
     */
    // protected $with = ['relation1', 'relation2'];

    ############################################################################################
    # Model events
    ############################################################################################

    public static function boot()
    {
        parent::boot();
        self::observe(ModuleObserver::class);

        static::saving(function (Module $element) {
            $valid = true;

            if ($valid) {
                // Fill default values
                $element->parent_id = (! $element->parent_id) ? 0 : $element->parent_id;
                $element->module_group_id = (! $element->module_group_id) ? 0 : $element->module_group_id;
                $element->level = (! $element->level) ? 0 : $element->level;
                $element->order = (! $element->order) ? 0 : $element->order;
                $element->default_route = (! $element->default_route) ? $element->name.'.index' : $element->default_route;
                $element->color_css = (! $element->color_css) ? 'aqua' : $element->color_css;
                $element->icon_css = (! $element->icon_css) ? 'fa fa-plus' : $element->icon_css;
            }

            return $valid;
        });

    }

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
        return 'App\Mainframe\Modules\\'.Str::plural($this->modelClassName());
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
            $this->model,
            'App\\'.$this->modelClassName(),
            $this->moduleNameSpace().'\\'.$this->modelClassName(),
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

    public static function byName($name)
    {
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
        $results = $q->remember(cacheTime('long'))
            ->get()
            ->toArray();

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
}