<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

use App\Mainframe\Modules\Uploads\Upload;

trait Uploadable
{
    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function uploads()
    {
        return $this->hasMany(Upload::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function latestUpload()
    {
        return $this->hasOne(Upload::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }
}