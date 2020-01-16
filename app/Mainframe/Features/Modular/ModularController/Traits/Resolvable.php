<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Modular\Resolvers\FormView;

trait Resolvable
{
    /**
     * Get the path to the blade file for edit form
     *
     * @return string
     */
    public function createFormView()
    {
        return FormView::resolve($this->moduleName, 'create');
    }

    /**
     * Get the path to the blade file for edit form
     *
     * @return string
     */
    public function editFormView()
    {
        return FormView::resolve($this->moduleName, 'edit', user());
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
                'name' => $this->moduleName,
                'files' => true
            ];
        }

        if ($type == 'edit') {
            return [
                'route' => [$this->moduleName.'.update', $this->element->id],
                'class' => $this->moduleName.'-form module-base-form edit-form',
                'name' => $this->moduleName,
                'files' => true,
                'method' => 'patch',
                'id' => $this->moduleName.'Form'
            ];
        }

        return [];
    }
}