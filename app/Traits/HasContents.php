<?php

namespace App\Traits;

use App\Content;

trait HasContents
{
    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function contents()
    {
        return $this->hasMany(Content::class, 'element_id')->where('module_id', $this->module()->id)->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
    }
}