<?php

namespace App\Mainframe\Contents;

use App\Mainframe\Features\Content\DynamicContent;

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



}