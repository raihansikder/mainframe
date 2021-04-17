<?php

namespace App\Mainframe\DynamicContents;

use App\Mainframe\Features\DynamicContents\DynamicContent;

class SampleContent extends DynamicContent
{

    /**
     * View blade location
     *
     * @var string
     */
    public $view;

    /**
     * Unique identifier
     *
     * @var
     */
    public $key;

    public $content;

    public function replace()
    {
        return [
            '[CONTENT]' => 'New Content',
        ];
    }

    public function output()
    {

    }

}