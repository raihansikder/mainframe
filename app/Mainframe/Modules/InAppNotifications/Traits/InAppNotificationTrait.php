<?php

namespace App\Mainframe\Modules\InAppNotifications\Traits;

use App\Module;
use App\User;

trait InAppNotificationTrait
{

    /*
    |--------------------------------------------------------------------------
    | Autofill and functions to calculated field updates
    |--------------------------------------------------------------------------
    */
    /**
     * Populate model
     * Fill data and set calculated data in fields for saving the module
     * This can depend of supporting fillFunct, setFunct,calculateFunct
     * return $this
     */
    // public function populate()
    // {
    //     $this->setDefaults();
    //
    //     return $this;
    // }

    public function setDefaults()
    {

        $this->type = $this->type ?? 'generic';
        $this->is_visible = $this->is_visible ?? 1;
        $this->accepts_response = $this->accepts_response ?? 0;
        $this->body = $this->body ?? $this->subtitle;
        $this->data = $this->data ?? json_encode(['user_id' => $this->id, 'type' => $this->id,]);
        $this->is_active = $this->is_active ?? 1;
        $this->order = $this->order ?? 9999;

        $this->setRespondedAt();

        return $this;
    }
    /*
    |--------------------------------------------------------------------------
    | Non-static helper functions
    |--------------------------------------------------------------------------
    */

    /**
     * Set responded_at
     *
     * @return $this
     */
    public function setRespondedAt()
    {
        if ($this->response && !$this->responded_at) {
            $this->responded_at = now();
        }

        return $this;
    }

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
    public function getDataJsonAttribute() { return json_decode($this->data); }

    public function getResponseJsonAttribute() { return json_decode($this->response); }

    public function getResponseOptionsJsonAttribute() { return json_decode($this->response_options); }

    public function getImagesJsonAttribute() { return json_decode($this->images); }


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

    public function user() { return $this->belongsTo(User::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notifiable() { return $this->morphTo(); }

}