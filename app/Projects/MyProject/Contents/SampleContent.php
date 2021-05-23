<?php

namespace App\Projects\MyProject\Contents;

use App\Mainframe\Features\Content\DynamicContent;
use Faker\Factory;

class SampleContent extends DynamicContent
{

    // public $view = 'mainframe.contents.dummy';
    // public $text;
    // public $key;

    // public $order;
    //
    // public function __construct($order = null)
    // {
    //     $this->order = $order; // Todo: Load
    // }

    public function replace()
    {
        return [
            '{TITLE}' => 'Replaced title',
            '{SALUTATION}' => $this->key(),
            '{INTRO}' => 'Some static content',
            '{SUBTITLE_START}' => $this->subtitleStart(),
            '{FOOTER}' => $this->footer(),
        ];
    }

    /*---------------------------------
    | Replace content generators
    |---------------------------------*/

    /**
     * @return string
     */
    public function subtitleStart()
    {
        if (user()->isAdmin()) {
            return "Hi Admin";
        }
    }

    /**
     * @return string
     */
    public function footer()
    {
        return Factory::create()->paragraph;
    }

}