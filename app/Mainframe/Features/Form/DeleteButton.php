<?php

namespace App\Mainframe\Features\Form;

class DeleteButton extends Button
{
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->value = $this->var['value'] ?? 'Delete';
        $this->params['name'] = 'genericDeleteBtn';
        $this->params['type'] = 'button';
        $this->params['class'] = $this->var['params']['class'] ?? 'btn btn-danger flat';

        $this->params['data-toggle'] = 'modal';
        $this->params['data-target'] = '#deleteModal';
        $this->params['data-route'] = $this->var['route'];
        $this->params['data-redirect_success'] = $this->var['redirect_success'] ?? '#';
        $this->params['data-redirect_fail'] = $this->var['redirect_fail'] ?? '#';
    }
}