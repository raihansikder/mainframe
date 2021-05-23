<?php

namespace App\Mainframe\Modules\Contents\Traits;

use App\Content;

/** @mixin Content $this */
trait ContentTrait
{
    /*
    |--------------------------------------------------------------------------
    | Section: Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Section: Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Attributes
    |--------------------------------------------------------------------------
    */
    public function getPartsArrayAttribute()
    {
        $parts = json_decode($this->parts ?? '[]');

        $array = [];
        foreach ($parts as $part) {
            $array[$part->name] = $part->content;
        }

        return $array;

    }

    /*
    |--------------------------------------------------------------------------
    | Section: Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

    /*
    |--------------------------------------------------------------------------
    | Section: helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Get content by part
     *
     * @param  null  $name
     * @return mixed|null
     */
    public function part($name = null)
    {
        if (!$name || $name == 'body') {
            return $this->body;
        }

        if ($name == 'title') {
            return $this->title;
        }

        if (isset($this->parts_array[$name])) {
            return $this->parts_array[$name];
        }

        return null;
    }

    /**
     * Get content by key
     * @param $key
     * @return Content|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function byKey($key)
    {
        return Content::where('key', $key)->where('is_active', 1)->first();
    }

}