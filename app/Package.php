<?php

namespace App;

/**
 * App\Package
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $details
 * @property string|null $monthly_price
 * @property string|null $yearly_price
 * @property string|null $modules
 * @property string|null $limits
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
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereModules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereMonthlyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereYearlyPrice($value)
 * @mixin \Eloquent
 */
class Package extends \App\Mainframe\Modules\Packages\Package
{

}