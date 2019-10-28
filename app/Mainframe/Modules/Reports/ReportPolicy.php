<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Modules\Users\User;
use App\Mainframe\Helpers\Modular\BaseModule\BaseModulePolicy;

class ReportPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any reports.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user) { }

    /**
     * Determine whether the user can view the report.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function view(User $user, $report) { }

    /**
     * Determine whether the user can create reports.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @return mixed
     */
    // public function create(User $user) { }

    /**
     * Determine whether the user can update the report.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function update(User $user, $report) { }

    /**
     * Determine whether the user can delete the report.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function delete(User $user, $report) { }

    /**
     * Determine whether the user can restore the report.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function restore(User $user, $report) { }

    /**
     * Determine whether the user can permanently delete the report.
     *
     * @param  \App\Mainframe\Modules\Users\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function forceDelete(User $user, $report) { }

}