<?php

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Countries\Traits\CountryProcessorTrait;

class CountryProcessor extends ModelProcessor
{

    use CountryProcessorTrait;

}