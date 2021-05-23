<?php

namespace App\Mainframe\Modules\PushNotifications\Traits;

use App\Mainframe\Jobs\JobSendPushNotifications;
use App\InAppNotification;
use App\PushNotification;
use App\User;

/** @mixin PushNotification $this */
trait PushNotificationTrait
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
    public function getDataJsonAttribute() { return json_decode($this->data); }

    public function getApiResponseJsonAttribute() { return json_decode($this->api_response); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function user() { return $this->belongsTo(User::class); }

    public function inAppNotification() { return $this->belongsTo(InAppNotification::class); }

    public function notifiable() { return $this->morphTo(); }
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
    //     $this->setDeviceToken();
    //     return $this;
    // }

    /**
     * Set Device Token
     *
     * @return $this
     */
    public function setDeviceToken()
    {

        if ($this->device_token) {
            return $this;
        }
        // if ($this->inAppNotification()->exists() && $user = $this->inAppNotification->user) {
        //     $this->device_token = $user->device_token;
        // }

        if ($this->user->device_token) {
            $this->device_token = $this->user->device_token;
        }

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Non-static helper functions
    |--------------------------------------------------------------------------
    */
    public function send()
    {
        JobSendPushNotifications::dispatch($this);
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

}