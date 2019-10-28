<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

use App\Mainframe\Modules\Uploads\Upload;
use App\Mainframe\Modules\Changes\Change;

trait Changable
{
    /**
     * Get a list of changes that happened to an element
     *
     * @return mixed
     */
    public function changes()
    {
        return $this->hasMany(Change::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }
}