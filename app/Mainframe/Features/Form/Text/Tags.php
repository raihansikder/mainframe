<?php

namespace App\Mainframe\Features\Form\Text;

class Tags extends TextArea
{
    public $tags;
    public $separator;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        $this->tags = $conf['tags'] ?? [];
        $this->separator = $conf['separator'] ?? ",";
    }

    public function tags()
    {
        return implode("','", $this->tags);
    }

}