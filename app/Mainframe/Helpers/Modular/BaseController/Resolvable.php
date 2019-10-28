<?php

namespace App\Mainframe\Helpers\Modular\
BaseController;

use App\Mainframe\Helpers\Modular\Resolvers\FormView;

trait Resolvable
{

    public function editFormView()
    {
        return FormView::resolve($this->moduleName, 'edit', user());
    }

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

    public function createFormView()
    {
        return FormView::resolve($this->moduleName, 'create');
    }

    public function createFromConfig()
    {
        return [
            'route' => $this->moduleName.'.store',
            'class' => $this->moduleName.'-form module-base-form create-form',
            'name' => $this->moduleName,
            'files' => true
        ];
    }
}