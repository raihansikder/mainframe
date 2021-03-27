<?php

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Modules\Countries\Traits\CountryPolicyTrait;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class CountryPolicy extends BaseModulePolicy
{

    use CountryPolicyTrait;
}
