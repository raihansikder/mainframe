<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Modules\Uploads\Upload;

/** @mixin $this BaseModule */
trait Uploadable
{
    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function uploads()
    {
        // return $this->hasMany(Upload::class, 'element_id')
        //     ->where('module_id', $this->module()->id)
        //     ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');

        return $this->morphMany('App\Mainframe\Modules\Uploads\Upload', 'uploadable');
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function latestUpload()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasOne(Upload::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }
}