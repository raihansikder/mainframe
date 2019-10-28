<?php /** @noinspection DuplicatedCode */

namespace App;

use App\Observers\ModulegroupObserver;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup as ModuleGroupModel;

/**
 * Class ModuleGroup
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
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $title
 * @property string|null $description
 * @property int|null $parent_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 */
class ModuleGroup extends ModuleGroupModel
{

}
