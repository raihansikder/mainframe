<?php

namespace App\Mainframe\Features\Form\Text;

class Tags extends TextArea
{
    public $tags;
    public $separator;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->tags = $var['tags'] ?? [];
        $this->separator = $var['separator'] ?? ",";
    }

    public function tags()
    {
        return implode("','", $this->tags);
    }

    public function value()
    {
        $value = parent::value();

        if ($value == '[]') {
            return null;
        }

        return $value;
    }

}