<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Mainframe\Modules\Contents;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Content;
use App\Mainframe\Modules\Contents\Traits\ContentProcessorTrait;

class ContentProcessor extends ModelProcessor
{
    // Note: Pull in necessary traits
    use ContentProcessorTrait;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var Content */
    public $element;


}