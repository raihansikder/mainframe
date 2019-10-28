<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

use App\User;

trait UpdaterTrait
{
    /**
     * Get the user who has created the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who has last updated the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}