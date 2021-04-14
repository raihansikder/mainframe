<?php

namespace App;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
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
 * @mixin \Eloquent
 */
class ModuleGroup extends \App\Mainframe\Modules\ModuleGroups\ModuleGroup
{

}