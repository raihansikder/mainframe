<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Notifications;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class NotificationPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any notifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the notification.
     *
     * @param  \App\User  $user
     * @param  Notification  $notification
     * @return mixed
     */
    // public function view($user, $notification) { }

    /**
     * Determine whether the user can create notifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the notification.
     *
     * @param  \App\User  $user
     * @param  Notification  $notification
     * @return mixed
     */
    // public function update(User $user, $notification) { }

    /**
     * Determine whether the user can delete the notification.
     *
     * @param  \App\User  $user
     * @param  Notification  $notification
     * @return mixed
     */
    // public function delete(User $user, $notification) { }

    /**
     * Determine whether the user can restore the notification.
     *
     * @param  \App\User  $user
     * @param  Notification  $notification
     * @return mixed
     */
    // public function restore(User $user, $notification) { }

    /**
     * Determine whether the user can permanently delete the notification.
     *
     * @param  \App\User  $user
     * @param  Notification  $notification
     * @return mixed
     */
    // public function forceDelete(User $user, $notification) { }

}
