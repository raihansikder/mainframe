<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use App\Mainframe\Modules\Groups\Group as GroupModel;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;

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
 * @method static \Illuminate\Database\Query\Builder|Group onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Group withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $title
 * @property array $permissions
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static Builder|Group newModelQuery()
 * @method static Builder|Group newQuery()
 * @method static Builder|Group query()
 * @method static Builder|Group whereCreatedAt($value)
 * @method static Builder|Group whereCreatedBy($value)
 * @method static Builder|Group whereDeletedAt($value)
 * @method static Builder|Group whereDeletedBy($value)
 * @method static Builder|Group whereId($value)
 * @method static Builder|Group whereIsActive($value)
 * @method static Builder|Group whereName($value)
 * @method static Builder|Group wherePermissions($value)
 * @method static Builder|Group whereTitle($value)
 * @method static Builder|Group whereUpdatedAt($value)
 * @method static Builder|Group whereUpdatedBy($value)
 * @method static Builder|Group whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 * @property-read int|null $users_count
 * @method static Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereTenantId($value)
 * @property int|null $project_id
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereProjectId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class Group extends GroupModel
{

}
