<?php

namespace App;

use App\Mainframe\Modules\Groups\Group as GroupModel;

/**
 * Class Group
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
 * @method static \Illuminate\Database\Query\Builder|\App\Group onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Group withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $title
 * @property array $permissions
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 * @property-read int|null $users_count
 */
class Group extends GroupModel
{

}
