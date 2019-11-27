<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

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
     * Form config array for create form
     *
     * @return array
     */
    public function createFromConfig()
    {
        return [
            'route' => $this->moduleName.'.store',
            'class' => $this->moduleName.'-form module-base-form create-form',
            'name' => $this->moduleName,
            'files' => true
        ];
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
     * Form config for model binding
     *
     * @return array
     */
    public function editFromConfig()
    {
        return [
            'route' => [$this->moduleName.'.update', $this->element->id],
            'class' => $this->moduleName.'-form module-base-form edit-form',
            'name' => $this->moduleName,
            'files' => true,
            'method' => 'patch',
            'id' => $this->moduleName.'Form'
        ];
    }

}