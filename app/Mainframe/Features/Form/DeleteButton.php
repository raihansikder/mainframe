<?php

namespace App\Mainframe\Features\Form;

class DeleteButton extends Button
{
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->value = $var['value'] ?? 'Delete';
        $this->params['name'] = 'genericDeleteBtn';
        $this->params['type'] = 'button';
        $this->params['class'] = $var['params']['class'] ?? 'btn btn-danger flat';

        $this->params['data-toggle'] = 'modal';
        $this->params['data-target'] = '#deleteModal';
        $this->params['data-route'] = $var['route'];
        $this->params['data-redirect_success'] = $var['redirect_success'] ?? '#';
        $this->params['data-redirect_fail'] = $var['redirect_fail'] ?? '#';
    }
}