<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Modules\Comments\Comment;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this  */
trait Commentable
{
    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function comments()
    {
        // return $this->hasMany('App\Mainframe\Modules\Comments\Comment', 'element_id')
        //     ->where('module_id', $this->module()->id)
        //     ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');

        return $this->morphMany('App\Mainframe\Modules\Comments\Comment', 'commentable');
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function latestComment()
    {
        return $this->hasOne(Comment::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }
}