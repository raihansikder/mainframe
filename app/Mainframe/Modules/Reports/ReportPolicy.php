<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Reports;

use App\User;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class ReportPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any reports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user) { }

    /**
     * Determine whether the user can view the report.
     *
     * @param  \App\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function view($user, $report) { }

    /**
     * Determine whether the user can create reports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the report.
     *
     * @param  \App\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function update($user, $report) { }

    /**
     * Determine whether the user can delete the report.
     *
     * @param  \App\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function delete($user, $report) { }

    /**
     * Determine whether the user can restore the report.
     *
     * @param  \App\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function restore($user, $report) { }

    /**
     * Determine whether the user can permanently delete the report.
     *
     * @param  \App\User  $user
     * @param  Report  $report
     * @return mixed
     */
    // public function forceDelete($user, $report) { }

}
