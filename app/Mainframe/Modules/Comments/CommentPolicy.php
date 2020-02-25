<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

/** @noinspection PhpUnused */

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class CommentPolicy extends BaseModulePolicy
{

    /**
     * Determine whether the user can view any comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user)
    {
        return parent::viewAny($user);
    }

    /**
     * Determine whether the user can view the comment.
     *
     * @param  \App\User  $user
     * @param  Comment  $comment
     * @return mixed
     */
    // public function view($user, $comment) { }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create($user) { }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User  $user
     * @param  Comment  $comment
     * @return mixed
     */
    // public function update(User $user, $comment) { }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User  $user
     * @param  Comment  $comment
     * @return mixed
     */
    // public function delete(User $user, $comment) { }

    /**
     * Determine whether the user can restore the comment.
     *
     * @param  \App\User  $user
     * @param  Comment  $comment
     * @return mixed
     */
    // public function restore(User $user, $comment) { }

    /**
     * Determine whether the user can permanently delete the comment.
     *
     * @param  \App\User  $user
     * @param  Comment  $comment
     * @return mixed
     */
    // public function forceDelete(User $user, $comment) { }

}
