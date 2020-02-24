<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;

class Form
{
    public $element;
    public $uid;

    public function __construct($element = null)
    {
        $this->element = $element;
        $this->uid = Str::random(8);
    }
}