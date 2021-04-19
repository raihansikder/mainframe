<?php

namespace App\Projects\MyProject\Features\Modular\BaseModule;

use App\Mainframe\Features\Modular\BaseModule\BaseModule as MainframeBaseModule;

/**
 * App\Projects\MyProject\Features\Modular\BaseModule\BaseModule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule query()
 * @mixin \Eloquent
 */
class BaseModule extends MainframeBaseModule
{

}