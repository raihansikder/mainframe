<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\Resolvers\FormView;

trait Resolvable
{

    /**
     * Resolve the view blade for the module form
     *
     * @param  string $state
     * @return string
     */
    public function form($state = 'create')
    {
        $default = $this->module->view_directory.'.form.default';
        if ($state == 'create') {
            return $default;
        }

        return $default;
    }

    /**
     * Resolve the view blade for grid
     *
     * @return string
     */
    public function grid()
    {
        return $this->module->view_directory.'.grid.default';
    }

    /**
     * Form config array for create form
     *
     * @param $type
     * @return array
     */
    public function formConfig($type)
    {
        if ($type == 'create') {
            return [
                'route' => $this->moduleName.'.store',
                'class' => $this->moduleName.'-form module-base-form create-form',
                'name'  => $this->moduleName,
                'files' => true,
            ];
        }

        if ($type == 'edit') {
            return [
                'route'  => [$this->moduleName.'.update', $this->element->id],
                'class'  => $this->moduleName.'-form module-base-form edit-form',
                'name'   => $this->moduleName,
                'files'  => true,
                'method' => 'patch',
                'id'     => $this->moduleName.'Form',
            ];
        }

        return [];
    }
}