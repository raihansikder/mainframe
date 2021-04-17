<?php

namespace App\Projects\MyProject\DynamicContents;

use App\Mainframe\Features\DynamicContents\DynamicContent;
use Faker\Factory;

class SampleContent extends DynamicContent
{

    /**
     * View blade location
     *
     * @var string
     */
    public $view = 'mainframe.contents.dummy';

    public $someObject;

    public function __construct($someObject = null)
    {
        $this->someObject = $someObject; // Todo: Load
    }

    public function replace()
    {

        $faker = Factory::create();

        return [
            '{TITLE}' => $this->key(),
            '{BODY}' => $faker->paragraph,
            '{FOOTER}' => $faker->paragraph,
        ];
    }

}