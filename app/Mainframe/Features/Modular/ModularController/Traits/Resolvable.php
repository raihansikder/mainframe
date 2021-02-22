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
            $this->module->modelClassPath().'ViewProcessor', // Check in same folder
            $this->module->namespace.'\\'.$this->module->modelClassName().'ViewProcessor',// Check in module directory
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