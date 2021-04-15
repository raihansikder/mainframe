<?php

namespace App\Mainframe\Modules\Comments\Traits;

use App\Module;

trait CommentTrait
{
    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable() { return $this->morphTo(); }

    /*
    |--------------------------------------------------------------------------
    | Autofill and functions to calculated field updates
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Non-static helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: Write non-static helper functions here

    /*
    |--------------------------------------------------------------------------
    | Static helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: static helper functions

    /*
    |--------------------------------------------------------------------------
    | Ability to create, edit, delete or restore
    |--------------------------------------------------------------------------
    |
    | An element can be editable or non-editable based on it's internal status
    | This is not related to any user, rather it is a model's individual sate
    | For example - A confirmed quotation should not be editable regardless
    | Of who is attempting to edit it.
    |
    */

    // public function isViewable() { return true; }
    // public function isCreatable() { return true; }
    // public function isEditable() { return true; }
    // public function isDeletable() { return true; }

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    */
    // /**
    //  * Notify admins when quote is accepted
    //  */
    // public function sendSomeNotification()
    // {
    //     Notification::send($users, new NotificationClass($this));
    // }
}