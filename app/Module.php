<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App;

use App\Mainframe\Modules\Modules\Module as MainframeModule;


/**
 * App\Module
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $model
 * @property string|null $controller
 * @property string|null $view
 * @property int|null $parent_id
 * @property int|null $module_group_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Module whereView($value)
 * @mixin \Eloquent
 */
class Module extends MainframeModule
{

}
