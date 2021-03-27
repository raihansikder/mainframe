<?php

namespace App\Mainframe\Modules\Projects;

use App\Mainframe\Modules\Projects\Traits\ProjectPolicyTrait;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ProjectPolicy extends BaseModulePolicy
{

    use ProjectPolicyTrait;
}
