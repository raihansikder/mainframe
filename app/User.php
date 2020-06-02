<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\User
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property int $email_confirmed
 * @property string|null $email_confirmed_at
 * @property string|null $email_confirmation_code
 * @property string|null $access_token
 * @property string|null $access_token_generated_at
 * @property string|null $api_token
 * @property string|null $api_token_generated_at
 * @property int $tenant_editable
 * @property array $permissions
 * @property string|null $group_ids_csv
 * @property string|null $group_titles_csv
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
 * @property string|null $auth_token
 * @property string|null $email_verified_at
 * @property string|null $last_active_time
 * @property string|null $last_login_time
 * @property string|null $last_logout_time
 * @property string|null $partner_uuid
 * @property string|null $currency
 * @property string|null $social_account_id
 * @property string|null $social_account_type
 * @property string|null $dob
 * @property string|null $group_ids
 * @property int|null $is_test
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereAccessToken($value)
 * @method static Builder|User whereAccessTokenGeneratedAt($value)
 * @method static Builder|User whereAddress1($value)
 * @method static Builder|User whereAddress2($value)
 * @method static Builder|User whereApiToken($value)
 * @method static Builder|User whereApiTokenGeneratedAt($value)
 * @method static Builder|User whereAuthToken($value)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCountryId($value)
 * @method static Builder|User whereCountryName($value)
 * @method static Builder|User whereCounty($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereCurrency($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereDeviceToken($value)
 * @method static Builder|User whereDob($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailConfirmationCode($value)
 * @method static Builder|User whereEmailConfirmed($value)
 * @method static Builder|User whereEmailConfirmedAt($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstLoginAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereFullName($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereGroupIds($value)
 * @method static Builder|User whereGroupIdsCsv($value)
 * @method static Builder|User whereGroupTitlesCsv($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereIsTest($value)
 * @method static Builder|User whereLastActiveTime($value)
 * @method static Builder|User whereLastLoginAt($value)
 * @method static Builder|User whereLastLoginTime($value)
 * @method static Builder|User whereLastLogoutTime($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereMobile($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNameInitial($value)
 * @method static Builder|User wherePartnerUuid($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePermissions($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSocialAccountId($value)
 * @method static Builder|User whereSocialAccountType($value)
 * @method static Builder|User whereTenantEditable($value)
 * @method static Builder|User whereTenantId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User whereUuid($value)
 * @method static Builder|User whereZipCode($value)
 * @mixin \Eloquent
 * @property int $is_tenant_editable
 * @property string|null $email_verification_code
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerificationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsTenantEditable($value)
 * @property int|null $project_id
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProjectId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read null|string $profile_pic
 * @property-read \App\Mainframe\Modules\Comments\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 */
class User extends \App\Mainframe\Modules\Users\User
{

}
