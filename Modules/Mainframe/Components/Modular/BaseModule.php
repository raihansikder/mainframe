<?php

namespace Modules\Mainframe\Components\Modular;

use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Mainframe\Components\Modular\Traits\Validable;

class BaseModule extends Model
{

    use SoftDeletes;
    use Rememberable;
    use Validable;

}
