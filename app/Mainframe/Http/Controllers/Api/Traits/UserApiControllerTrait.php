<?php

namespace App\Mainframe\Http\Controllers\Api\Traits;

use App\Mainframe\Http\Controllers\Api\UserApiController;
use App\Mainframe\Modules\InAppNotifications\InAppNotificationController;
use App\Module;
use App\Mainframe\Modules\Uploads\UploadController;
use App\Mainframe\Modules\Users\UserController;

/** @mixin UserApiController $this */
trait UserApiControllerTrait
{
    /*---------------------------------
    | Inject user identity
    |---------------------------------*/
    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        if (isset($this->user->id)) {
            request()->merge(['user_id' => $this->user->id]);
        }
    }

    /*---------------------------------
    | User profile, profile pic
    |---------------------------------*/
    /**
     * Get user profile
     *
     * @return mixed
     */

    public function showUser()
    {
        $payload = $this->user->load(['groups'])
            ->makeHidden(['group_ids', 'is_test']);

        return $this->load($payload)->send();
    }

    /**
     * Update user
     *
     * @return mixed|\App\User
     */
    public function updateUser()
    {
        return app(UserController::class)->update(request(), $this->user->id);
    }

    /**
     * Store user profile pic
     *
     * @return mixed
     */
    public function profilePicStore()
    {
        request()->merge([
            'module_id' => Module::byName('users')->id,
            'element_id' => $this->user->id,
            'type' => 'profile-pic',
        ]);

        return app(UploadController::class)->store(request());
    }

    /**
     * Delete user profile pic
     *
     * @return mixed
     * @throws \Exception
     */
    public function profilePicDestroy()
    {
        $upload = $this->user->uploads->where('type', 'profile-pic')->first();
        if ($upload) {
            return app(UploadController::class)->destroy($upload->id);
        }

        return $this->notFound();
    }

    /*---------------------------------
    | In-app-notifications
    |---------------------------------*/
    /**
     * List in-app-notifications
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inAppNotifications()
    {
        request()->merge([
            'user_id' => $this->user->id,
            'is_visible' => 1,
            'is_active' => 1,
            'sort_by' => 'created_at',
            'sort_order' => 'desc',
        ]);

        return app(InAppNotificationController::class)->listJson();
    }

    /**
     * Update an in-app-notification
     *
     * @param $id
     * @return mixed
     */
    public function inAppNotificationUpdate($id)
    {
        return app(InAppNotificationController::class)->update(request(), $id);
    }

    /**
     * Mark an in-app-notification as read
     *
     * @param $id
     * @return InAppNotificationController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function inAppNotificationRead($id)
    {
        request()->merge(['read_at' => now()]);

        return app(InAppNotificationController::class)->update(request(), $id);
    }

    /**
     * Mark all in-app-notifications as read
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inAppNotificationsReadAll()
    {
        $this->user->inAppNotifications()->update([
            'read_at' => now(),
        ]);

        return $this->success('All notifications marked as read')->json();
    }

    /**
     * Delete an in-app-notification
     *
     * @param $id
     * @return InAppNotificationController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function inAppNotificationDelete($id)
    {
        return app(InAppNotificationController::class)->destroy($id);
    }

    /**
     * Delete all in-app-notifications
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inAppNotificationsDeleteAll()
    {
        $this->user->inAppNotifications()->delete();

        return $this->success('All notifications successfully deleted')->json();
    }

}