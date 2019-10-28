<?php

namespace App;

use App\Mainframe\Modules\Changes\Change as ChangeModel;

/**
 * Class Change
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
 * @method static \Illuminate\Database\Query\Builder|\App\Change onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Change withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Change withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $change_set
 * @property int|null $module_id
 * @property string|null $moduleName
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $field
 * @property string|null $old
 * @property string|null $new
 * @property string|null $description
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereChangeset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereModuleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 * @property string|null $module_name TRIAL
 */
class Change extends ChangeModel
{

}
