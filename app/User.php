<?php

namespace App;

use App\Mainframe\Modules\Users\User as UserModel;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Mainframe\Modules\Users\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\Mainframe\Modules\Users\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAccessTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApiTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGroupIdsCsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGroupTitlesCsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastActiveTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLogoutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNameInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePartnerUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSocialAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSocialAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTenantEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereZipCode($value)
 * @mixin \Eloquent
 */
class User extends UserModel
{

}
