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
        return FormView::resolve($this->name, 'create');
    }

    /**
     * Form config array for create form
     *
     * @return array
     */
    public function createFromConfig()
    {
        return [
            'route' => $this->name.'.store',
            'class' => $this->name.'-form module-base-form create-form',
            'name' => $this->name,
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
        return FormView::resolve($this->name, 'edit', user());
    }

    /**
     * Form config for model binding
     *
     * @return array
     */
    public function editFromConfig()
    {
        return [
            'route' => [$this->name.'.update', $this->element->id],
            'class' => $this->name.'-form module-base-form edit-form',
            'name' => $this->name,
            'files' => true,
            'method' => 'patch',
            'id' => $this->name.'Form'
        ];
    }

}