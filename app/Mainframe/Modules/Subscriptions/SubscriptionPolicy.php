<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Subscriptions;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SubscriptionPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any subscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the subscription.
     *
     * @param  \App\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function view($user, $subscription) { }

    /**
     * Determine whether the user can create subscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the subscription.
     *
     * @param  \App\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function update($user, $subscription) { }

    /**
     * Determine whether the user can delete the subscription.
     *
     * @param  \App\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function delete($user, $subscription) { }

    /**
     * Determine whether the user can restore the subscription.
     *
     * @param  \App\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function restore($user, $subscription) { }

    /**
     * Determine whether the user can permanently delete the subscription.
     *
     * @param  \App\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function forceDelete($user, $subscription) { }

}
