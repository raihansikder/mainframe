<?php

namespace App\Projects\MyProject\Features\Modular\BaseModule;

use App\Mainframe\Features\Modular\BaseModule\BaseModule as MfBaseModule;

/**
 * App\Projects\MyProject\Features\Modular\BaseModule\BaseModule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User $creator
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|MfBaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Features\Modular\BaseModule\BaseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Features\Modular\BaseModule\BaseModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Features\Modular\BaseModule\BaseModule query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 */
class BaseModule extends MfBaseModule
{

}