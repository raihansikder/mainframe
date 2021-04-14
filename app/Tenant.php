<?php

namespace App;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Projects\Project|null $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
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
 * @mixin \Eloquent
 */
class Tenant extends Mainframe\Modules\Tenants\Tenant
{

}