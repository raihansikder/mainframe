<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;

class Form
{
    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    public $element;

    /** @var string */
    public $uid;

    public function __construct($element = null)
    {
        $this->element = $element;
        $this->uid = Str::random(8);
    }
}