<?php

namespace App\Mainframe\Features\Form\Text;

use App\Mainframe\Features\Form\Input;

class TextArea extends Input
{
    public $editorConfig;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->containerClass = $this->var['container_class'] ?? $this->var['div'] ?? 'col-md-6';
        $this->editorConfig = $var['editorConfig'] ?? 'editor_config_basic';
    }
}