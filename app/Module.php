<?php

namespace App;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Projects\Project|null $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
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
 * @mixin \Eloquent
 */
class Module extends \App\Mainframe\Modules\Modules\Module
{

}