<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class SubscriptionPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any subscriptions.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the subscription.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function view(User $user, $subscription) { }

    /**
     * Determine whether the user can create subscriptions.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the subscription.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function update(User $user, $subscription) { }

    /**
     * Determine whether the user can delete the subscription.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function delete(User $user, $subscription) { }

    /**
     * Determine whether the user can restore the subscription.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function restore(User $user, $subscription) { }

    /**
     * Determine whether the user can permanently delete the subscription.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Subscription  $subscription
     * @return mixed
     */
    // public function forceDelete(User $user, $subscription) { }

}
