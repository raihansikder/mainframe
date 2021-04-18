<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Change
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $changeable_id
 * @property string|null $changeable_type
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $field
 * @property string|null $old
 * @property string|null $new
 * @property string|null $note
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $changeable
 * @property-read \Illuminate\Database\Eloquent\Collection|Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Change query()
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereChangeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereChangeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUuid($value)
 */
	class Change extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $body
 * @property string|null $commentable_type
 * @property int|null $commentable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUuid($value)
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Content
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $key
 * @property string|null $title
 * @property string|null $body
 * @property string|null $parts JSON structure for additional dynamic parts
 * @property string|null $help_text Hint for how/where this is used
 * @property string|null $tags tags/spreadable
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $parts_array
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereHelpText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereParts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUuid($value)
 */
	class Content extends \Eloquent {}
}

namespace App{
/**
 * App\Country
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $code
 * @property string|null $country_id
 * @property string|null $iso2
 * @property string|null $country_short_name
 * @property string|null $country_long_name
 * @property string|null $iso3
 * @property string|null $numcode
 * @property string|null $un_member
 * @property string|null $calling_code
 * @property string|null $cctld
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $currency
 * @property string|null $currency_symbol
 * @property string|null $currency_override
 * @property string|null $currency_override_symbol
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCallingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCctld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyOverride($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyOverrideSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUnMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUuid($value)
 */
	class Country extends \Eloquent {}
}

namespace App{
/**
 * App\Group
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $title
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUuid($value)
 */
	class Group extends \Eloquent {}
}

namespace App{
/**
 * App\InAppNotification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $notifiable_type Class of the notifiable
 * @property int|null $notifiable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property int|null $user_id Recipient user id
 * @property string|null $type
 * @property string|null $event Name of the event i.e. "appointment.created"
 * @property string|null $subtitle Subtitle the notification
 * @property string|null $body Main body of the notification
 * @property string|null $images JSON array of image URLs
 * @property array|null $data Additional JSON payload
 * @property int|null $order Can be useful for sequencing if needed
 * @property int|null $is_visible Flag to indicate whether this entry should be visible in the user notification list
 * @property int|null $announcement_id Announcement id from which it is generated
 * @property int|null $accepts_response Flag to indicate whether user can respond to this notification
 * @property string|null $response_options JSON to show response options
 * @property string|null $response Capture user response to an announcement
 * @property string|null $responded_at Capture user response datetime
 * @property string|null $read_at Set the time stamp when a user "marks as read"
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $data_json
 * @property-read mixed $images_json
 * @property-read mixed $response_json
 * @property-read mixed $response_options_json
 * @property-read \App\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAcceptsResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAnnouncementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereRespondedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponseOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUuid($value)
 */
	class InAppNotification extends \Eloquent {}
}

namespace App\Mainframe\Features\Modular\BaseModule{
/**
 * Class BaseModule
 *
 * @package App
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $deleted_by
 * @method static bool|null forceDelete()
 * @method static Model|Builder|mixed remember($param)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User $creator
 * @property-read \App\Project $project
 * @property-read \App\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 */
	class BaseModule extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Mainframe\Modules\Changes{
/**
 * App\Mainframe\Modules\Changes\Change
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $changeable_id
 * @property string|null $changeable_type
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $field
 * @property string|null $old
 * @property string|null $new
 * @property string|null $note
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $changeable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Change query()
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereChangeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereChangeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Change whereUuid($value)
 */
	class Change extends \Eloquent {}
}

namespace App\Mainframe\Modules\Comments{
/**
 * App\Mainframe\Modules\Comments\Comment
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $body
 * @property string|null $commentable_type
 * @property int|null $commentable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUuid($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Mainframe\Modules\Contents{
/**
 * App\Mainframe\Modules\Contents\Content
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $key
 * @property string|null $title
 * @property string|null $body
 * @property string|null $parts JSON structure for additional dynamic parts
 * @property string|null $help_text Hint for how/where this is used
 * @property string|null $tags tags/spreadable
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $parts_array
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereHelpText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereParts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUuid($value)
 */
	class Content extends \Eloquent {}
}

namespace App\Mainframe\Modules\Countries{
/**
 * App\Country
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $code
 * @property string|null $country_id
 * @property string|null $iso2
 * @property string|null $country_short_name
 * @property string|null $country_long_name
 * @property string|null $iso3
 * @property string|null $numcode
 * @property string|null $un_member
 * @property string|null $calling_code
 * @property string|null $cctld
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $currency
 * @property string|null $currency_symbol
 * @property string|null $currency_override
 * @property string|null $currency_override_symbol
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCallingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCctld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCountryLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCountryShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCurrencyOverride($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCurrencyOverrideSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUnMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUuid($value)
 * @mixin \Eloquent
 * @property-read \App\Project $project
 * @property-read \App\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 */
	class Country extends \Eloquent {}
}

namespace App\Mainframe\Modules\Groups{
/**
 * App\Mainframe\Modules\Groups\Group
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $title
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUuid($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Mainframe\Modules\InAppNotifications{
/**
 * App\Mainframe\Modules\InAppNotifications\InAppNotification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $notifiable_type Class of the notifiable
 * @property int|null $notifiable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property int|null $user_id Recipient user id
 * @property string|null $type
 * @property string|null $event Name of the event i.e. "appointment.created"
 * @property string|null $subtitle Subtitle the notification
 * @property string|null $body Main body of the notification
 * @property string|null $images JSON array of image URLs
 * @property array|null $data Additional JSON payload
 * @property int|null $order Can be useful for sequencing if needed
 * @property int|null $is_visible Flag to indicate whether this entry should be visible in the user notification list
 * @property int|null $announcement_id Announcement id from which it is generated
 * @property int|null $accepts_response Flag to indicate whether user can respond to this notification
 * @property string|null $response_options JSON to show response options
 * @property string|null $response Capture user response to an announcement
 * @property string|null $responded_at Capture user response datetime
 * @property string|null $read_at Set the time stamp when a user "marks as read"
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $data_json
 * @property-read mixed $images_json
 * @property-read mixed $response_json
 * @property-read mixed $response_options_json
 * @property-read \App\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAcceptsResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAnnouncementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereRespondedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponseOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUuid($value)
 */
	class InAppNotification extends \Eloquent {}
}

namespace App\Mainframe\Modules\ModuleGroups{
/**
 * App\Mainframe\Modules\ModuleGroups\ModuleGroup
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $route_path
 * @property string|null $route_name
 * @property int|null $parent_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_visible
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUuid($value)
 */
	class ModuleGroup extends \Eloquent {}
}

namespace App\Mainframe\Modules\Modules{
/**
 * App\Mainframe\Modules\Modules\Module
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $module_table
 * @property string|null $route_path /relative/path/to/index
 * @property string|null $route_name some.name
 * @property string|null $class_directory app/Mainframe/Modules/SomeModules
 * @property string|null $namespace
 * @property string|null $model app/Mainframe/Modules/SomeModules/NameOfModule
 * @property string|null $policy
 * @property string|null $processor
 * @property string|null $controller
 * @property string|null $view_directory
 * @property int|null $parent_id
 * @property int|null $module_group_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_visible
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module wherePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereViewDirectory($value)
 */
	class Module extends \Eloquent {}
}

namespace App\Mainframe\Modules\Notifications{
/**
 * App\Mainframe\Modules\Notifications\Notification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string $data
 * @property string|null $read_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUuid($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Mainframe\Modules\Packages{
/**
 * App\Mainframe\Modules\Packages\Package
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $details
 * @property string|null $monthly_price
 * @property string|null $yearly_price
 * @property string|null $modules
 * @property string|null $limits
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereModules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereMonthlyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereYearlyPrice($value)
 */
	class Package extends \Eloquent {}
}

namespace App\Mainframe\Modules\Projects{
/**
 * App\Mainframe\Modules\Projects\Project
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property string|null $configuration JSON configuration for a project
 * @property string|null $route_group
 * @property string|null $class_directory
 * @property string|null $namespace
 * @property string|null $view_directory
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereConfiguration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRouteGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereViewDirectory($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Mainframe\Modules\PushNotifications{
/**
 * App\Mainframe\Modules\PushNotifications\PushNotification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $user_id Recipient user id
 * @property string|null $device_token Firebase Device Identifier to target a user
 * @property int|null $in_app_notification_id Related in-app notification
 * @property int|null $order Can be used for ordering/sequencing sending
 * @property string|null $type Generic|Popup Type indicates the purpose or objective. It is often mapped with a paired in-app notification'
 * @property string|null $event Name of the event i.e. "appointment.created"
 * @property string|null $body Main body of the notification
 * @property string|null $data Additional JSON payload
 * @property string|null $api_response Full JSON response from the sender service
 * @property string|null $multicast_id Set from FCM response of send attempt. The existence of multicast_id indicates that attempt was successfully made. Fill from api_response
 * @property int|null $success_count Fill from api_response
 * @property int|null $failure_count Fill from api_response
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $api_response_json
 * @property-read mixed $data_json
 * @property-read \App\InAppNotification|null $inAppNotification
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereApiResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereFailureCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereInAppNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereMulticastId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereSuccessCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUuid($value)
 */
	class PushNotification extends \Eloquent {}
}

namespace App\Mainframe\Modules\Reports{
/**
 * App\Mainframe\Modules\Reports\Report
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $title
 * @property string|null $description
 * @property string|null $parameters
 * @property string|null $type
 * @property string|null $version
 * @property int|null $module_id
 * @property int|null $is_module_default
 * @property string|null $tags
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsModuleDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereVersion($value)
 */
	class Report extends \Eloquent {}
}

namespace App\Mainframe\Modules\Settings{
/**
 * Class Setting
 *
 * @property int $id TRIAL
 * @property string|null $uuid TRIAL
 * @property string|null $name TRIAL
 * @property string|null $title TRIAL
 * @property string|null $type TRIAL
 * @property string|null $description TRIAL
 * @property string|null $value TRIAL
 * @property int|null $is_active TRIAL
 * @property int|null $created_by TRIAL
 * @property int|null $updated_by TRIAL
 * @property \Illuminate\Support\Carbon|null $created_at TRIAL
 * @property \Illuminate\Support\Carbon|null $updated_at TRIAL
 * @property \Illuminate\Support\Carbon|null $deleted_at TRIAL
 * @property int|null $deleted_by TRIAL
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereCreatedBy($value)
 * @method static Builder|Setting whereDeletedAt($value)
 * @method static Builder|Setting whereDeletedBy($value)
 * @method static Builder|Setting whereDescription($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereIsActive($value)
 * @method static Builder|Setting whereName($value)
 * @method static Builder|Setting whereTitle($value)
 * @method static Builder|Setting whereType($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereUpdatedBy($value)
 * @method static Builder|Setting whereUuid($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin \Eloquent
 * @method static Builder|BaseModule active()
 * @property-read \App\Project $project
 * @property-read \App\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 */
	class Setting extends \Eloquent {}
}

namespace App\Mainframe\Modules\Spreads{
/**
 * App\Mainframe\Modules\Spreads\Spread
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $spreadable_type
 * @property int|null $spreadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $key Field name
 * @property string|null $tag Tag name
 * @property string|null $relates_to The second model
 * @property int|null $related_id
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $spreadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatesTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUuid($value)
 */
	class Spread extends \Eloquent {}
}

namespace App\Mainframe\Modules\Subscriptions{
/**
 * App\Mainframe\Modules\Subscriptions\Subscription
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $package_id
 * @property string|null $valid_from
 * @property string|null $valid_till
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereValidFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereValidTill($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Mainframe\Modules\Tenants{
/**
 * App\Mainframe\Modules\Tenants\Tenant
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $user_id Tenant admin who signed up
 * @property string|null $route_group
 * @property string|null $class_directory
 * @property string|null $namespace
 * @property string|null $view_directory
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereRouteGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereViewDirectory($value)
 */
	class Tenant extends \Eloquent {}
}

namespace App\Mainframe\Modules\Uploads{
/**
 * App\Mainframe\Modules\Uploads\Upload
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $path
 * @property int|null $order
 * @property string|null $ext
 * @property int|null $bytes
 * @property string|null $description
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $dir
 * @property-read mixed $url
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUuid($value)
 */
	class Upload extends \Eloquent {}
}

namespace App\Mainframe\Modules\Users{
/**
 * App\Mainframe\Modules\Users\User
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $api_token X-Auth-Token
 * @property string|null $api_token_generated_at
 * @property int $is_tenant_editable
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $name_initial
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $device_token
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $county
 * @property int|null $country_id
 * @property string|null $country_name
 * @property string|null $zip_code
 * @property string|null $phone
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $auth_token Bearer token
 * @property string|null $email_verified_at
 * @property string|null $email_verification_code
 * @property string|null $currency
 * @property string|null $social_account_id
 * @property string|null $social_account_type
 * @property string|null $dob
 * @property array|null $group_ids
 * @property int|null $is_test
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Country|null $country
 * @property-read \App\User|null $creator
 * @property-read null|string $profile_pic
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InAppNotification[] $inAppNotifications
 * @property-read int|null $in_app_notifications_count
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerificationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTenantEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App{
/**
 * App\Module
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $module_table
 * @property string|null $route_path /relative/path/to/index
 * @property string|null $route_name some.name
 * @property string|null $class_directory app/Mainframe/Modules/SomeModules
 * @property string|null $namespace
 * @property string|null $model app/Mainframe/Modules/SomeModules/NameOfModule
 * @property string|null $policy
 * @property string|null $processor
 * @property string|null $controller
 * @property string|null $view_directory
 * @property int|null $parent_id
 * @property int|null $module_group_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_visible
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module wherePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereViewDirectory($value)
 */
	class Module extends \Eloquent {}
}

namespace App{
/**
 * App\ModuleGroup
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $route_path
 * @property string|null $route_name
 * @property int|null $parent_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_visible
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUuid($value)
 */
	class ModuleGroup extends \Eloquent {}
}

namespace App{
/**
 * App\Notification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string $data
 * @property string|null $read_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUuid($value)
 */
	class Notification extends \Eloquent {}
}

namespace App{
/**
 * App\Package
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $details
 * @property string|null $monthly_price
 * @property string|null $yearly_price
 * @property string|null $modules
 * @property string|null $limits
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereModules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereMonthlyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereYearlyPrice($value)
 */
	class Package extends \Eloquent {}
}

namespace App{
/**
 * App\Project
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property string|null $configuration JSON configuration for a project
 * @property string|null $route_group
 * @property string|null $class_directory
 * @property string|null $namespace
 * @property string|null $view_directory
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereConfiguration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRouteGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereViewDirectory($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Projects\MyProject\Features\Modular\BaseModule{
/**
 * App\Projects\MyProject\Features\Modular\BaseModule\BaseModule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule query()
 */
	class BaseModule extends \Eloquent {}
}

namespace App\Projects\MyProject\Modules\Settings{
/**
 * App\Projects\MyProject\Modules\Settings\Setting
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description
 * @property string|null $value
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Projects\MyProject\Modules\Uploads{
/**
 * App\Projects\MyProject\Modules\Uploads\Upload
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $path
 * @property int|null $order
 * @property string|null $ext
 * @property int|null $bytes
 * @property string|null $description
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $dir
 * @property-read mixed $url
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUuid($value)
 */
	class Upload extends \Eloquent {}
}

namespace App\Projects\MyProject\Modules\Users{
/**
 * App\Projects\MyProject\Modules\Users\User
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $api_token X-Auth-Token
 * @property string|null $api_token_generated_at
 * @property int $is_tenant_editable
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $name_initial
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $device_token
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $county
 * @property int|null $country_id
 * @property string|null $country_name
 * @property string|null $zip_code
 * @property string|null $phone
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $auth_token Bearer token
 * @property string|null $email_verified_at
 * @property string|null $email_verification_code
 * @property string|null $currency
 * @property string|null $social_account_id
 * @property string|null $social_account_type
 * @property string|null $dob
 * @property array|null $group_ids
 * @property int|null $is_test
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Country|null $country
 * @property-read \App\User|null $creator
 * @property-read null|string $profile_pic
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InAppNotification[] $inAppNotifications
 * @property-read int|null $in_app_notifications_count
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerificationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTenantEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App{
/**
 * App\PushNotification
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $user_id Recipient user id
 * @property string|null $device_token Firebase Device Identifier to target a user
 * @property int|null $in_app_notification_id Related in-app notification
 * @property int|null $order Can be used for ordering/sequencing sending
 * @property string|null $type Generic|Popup Type indicates the purpose or objective. It is often mapped with a paired in-app notification'
 * @property string|null $event Name of the event i.e. "appointment.created"
 * @property string|null $body Main body of the notification
 * @property string|null $data Additional JSON payload
 * @property string|null $api_response Full JSON response from the sender service
 * @property string|null $multicast_id Set from FCM response of send attempt. The existence of multicast_id indicates that attempt was successfully made. Fill from api_response
 * @property int|null $success_count Fill from api_response
 * @property int|null $failure_count Fill from api_response
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $api_response_json
 * @property-read mixed $data_json
 * @property-read \App\InAppNotification|null $inAppNotification
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereApiResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereFailureCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereInAppNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereMulticastId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereSuccessCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PushNotification whereUuid($value)
 */
	class PushNotification extends \Eloquent {}
}

namespace App{
/**
 * App\Report
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $title
 * @property string|null $description
 * @property string|null $parameters
 * @property string|null $type
 * @property string|null $version
 * @property int|null $module_id
 * @property int|null $is_module_default
 * @property string|null $tags
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsModuleDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereVersion($value)
 */
	class Report extends \Eloquent {}
}

namespace App{
/**
 * App\Setting
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description
 * @property string|null $value
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App{
/**
 * App\Spread
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $spreadable_type
 * @property int|null $spreadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $key Field name
 * @property string|null $tag Tag name
 * @property string|null $relates_to The second model
 * @property int|null $related_id
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $spreadable
 * @property-read \Illuminate\Database\Eloquent\Collection|Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatesTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUuid($value)
 */
	class Spread extends \Eloquent {}
}

namespace App{
/**
 * App\Subscription
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $package_id
 * @property string|null $valid_from
 * @property string|null $valid_till
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereValidFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereValidTill($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App{
/**
 * App\Tenant
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $user_id Tenant admin who signed up
 * @property string|null $route_group
 * @property string|null $class_directory
 * @property string|null $namespace
 * @property string|null $view_directory
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereRouteGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereViewDirectory($value)
 */
	class Tenant extends \Eloquent {}
}

namespace App{
/**
 * App\Upload
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $path
 * @property int|null $order
 * @property string|null $ext
 * @property int|null $bytes
 * @property string|null $description
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read mixed $dir
 * @property-read mixed $url
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUuid($value)
 */
	class Upload extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $api_token X-Auth-Token
 * @property string|null $api_token_generated_at
 * @property int $is_tenant_editable
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $name_initial
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $device_token
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $county
 * @property int|null $country_id
 * @property string|null $country_name
 * @property string|null $zip_code
 * @property string|null $phone
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $auth_token Bearer token
 * @property string|null $email_verified_at
 * @property string|null $email_verification_code
 * @property string|null $currency
 * @property string|null $social_account_id
 * @property string|null $social_account_type
 * @property string|null $dob
 * @property array|null $group_ids
 * @property int|null $is_test
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Country|null $country
 * @property-read User|null $creator
 * @property-read null|string $profile_pic
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InAppNotification[] $inAppNotifications
 * @property-read int|null $in_app_notifications_count
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerificationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTenantEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZipCode($value)
 */
	class User extends \Eloquent {}
}

