<?php

namespace App\Mainframe\Features\Form;

class DeleteButton extends Button
{
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        $this->value = $conf['value'] ?? 'Delete';
        $this->params['name'] = 'genericDeleteBtn';
        $this->params['type'] = 'button';
        $this->params['class'] = $conf['params']['class'] ?? 'btn btn-danger flat';

        $this->params['data-toggle'] = 'modal';
        $this->params['data-target'] = '#deleteModal';
        $this->params['data-route'] = $conf['route'];
        $this->params['data-redirect_success'] = $conf['redirect_success'] ?? '#';
        $this->params['data-redirect_fail'] = $conf['redirect_fail'] ?? '#';
    }
}