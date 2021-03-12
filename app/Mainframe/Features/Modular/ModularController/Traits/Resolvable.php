<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

trait Resolvable
{
    /**
     * Get the view processor instance
     *
     * @return mixed|null
     */
    public function viewProcessor()
    {

        $classPaths = [
            // Note: Check in same folder
            $this->module->modelClassPath().'View',
            $this->module->modelClassPath().'ViewProcessor',

            // Check in module directory
            $this->module->namespace.'\\'.$this->module->modelClassName().'View',
            $this->module->namespace.'\\'.$this->module->modelClassName().'ViewProcessor',

            // Check in module directory
            'App\Mainframe\Features\Modular\BaseModule\BaseModuleView',
            'App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor',
        ];

        foreach ($classPaths as $classPath) {
            if (class_exists($classPath)) {
                return (new $classPath);
            }
        }

        return null;
    }
}