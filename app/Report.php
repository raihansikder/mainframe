<?php

namespace App;

/**
 * App\Report
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $title
 * @property string|null $description
 * @property string|null $parameters
 * @property string|null $type
 * @property string|null $version
 * @property int|null $module_id
 * @property int|null $is_module_default
 * @property string|null $tags
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsModuleDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereVersion($value)
 * @mixin \Eloquent
 * @property int|null $is_tenant_editable Some settings are not allowed to be edited by tenant
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsTenantEditable($value)
 */
class Report extends \App\Mainframe\Modules\Reports\Report
{

}