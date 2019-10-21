<?php

namespace App\Mainframe\Modules\Modules\Traits;

use Illuminate\Support\Str;

/** @var \App\Mainframe\Modules\Modules\Module $this */
trait Mainframe
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
        return $this->moduleNameSpace().'\\Validators\\'.$this->modelClassName().'\\Validator';
    }

    /**
     * Returns full qualified calls path
     *
     * @return bool|mixed
     */
    public function modelClassPath()
    {

        /** @var \App\Mainframe\Modules\Modules\Module|self $this */
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
     * @return mixed
     */
    public function validatorInstance($element)
    {
        $classPath = $this->modelClassPath();

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

}