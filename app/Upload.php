<?php

namespace App;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

/**
 * App\Upload
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $path
 * @property int|null $order
 * @property string|null $ext
 * @property int|null $bytes
 * @property string|null $description
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
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
 * @property-read mixed $dir
 * @property-read mixed $url
 * @property-read \App\Mainframe\Modules\Modules\Module|null $linkedModule
 * @property-read \App\Mainframe\Modules\Projects\Project|null $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUuid($value)
 * @mixin \Eloquent
 */
class Upload extends \App\Projects\MyProject\Modules\Uploads\Upload
{

}