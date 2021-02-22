<?php

namespace App\Mainframe\Modules\Uploads\Traits;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Uploads\Upload;

trait UploadTrait
{
    /**
     * get all uploads under a module
     *
     * @param  array  $entry_uuid
     * @param  string  $filter
     * @return mixed
     */
    public static function getList($entry_uuid, $filter = '')
    {
        $uploads = Upload::where('element_uuid', $entry_uuid);

        return $uploads->orderBy('created_at', 'DESC')->get();
    }

    /**
     * During creation of a module entry there is no id but
     * still files can be uploaded.
     *
     * @param $element BaseModule
     */
    public static function linkTemporaryUploads($element)
    {
        Upload::where('element_uuid', $element->uuid)->update([
            'element_id' => $element->id,
            'uploadable_id' => $element->id,
        ]);
    }

    /**
     * returns the absolute server path.
     * This function is useful for plugins that needs the file
     * location in the operating system
     *
     * @return string
     */
    public function absPath()
    {
        return public_path().$this->path;
    }

    /**
     * Get the url for thumbnail of an upload.
     *
     * @return string
     */
    public function thumbSrc()
    {
        if ($this->isImage()) {
            $src = route('download', $this->uuid);
        } else {
            $src = $this->extIconPath();
        }

        return $src;
    }

    /**
     * Checks if an upload file is image
     *
     * @return mixed
     */
    public function isImage()
    {
        if (isImageExtension($this->ext)) {
            return true;
        }

        return false;
    }

    /**
     * 'file_type_icons' contains number of file type icons.
     *
     * @return string
     */
    public function extIconPath()
    {
        $ext = strtolower($this->ext); // get full lower case extension
        $icon_path = 'mainframe/images/file_type_icons/'.$ext.'.png';

        if (! \File::exists($icon_path)) {
            $icon_path = 'mainframe/images/file_type_icons/noimage.png';
        }

        return asset($icon_path);
    }

    /**
     * Generate masked and plain url of the uploaded file.
     *
     * @param  bool  $auth  set false to generate plain url.
     * @return string
     */
    public function downloadUrl($auth = true)
    {
        if ($auth) {
            return route('download', $this->uuid);
        }

        return asset($this->path);
    }

    /**
     * Fill extension
     *
     * @return $this
     */
    public function fillExtension()
    {
        $this->ext = extFrmPath($this->path); // Store file extension separately

        return $this;
    }

    /**
     * Fill data to relate this upload with another module element.
     *
     * @return $this
     */
    public function fillModuleAndElementData()
    {
        $module = $this->linkedModule;
        $element = null;

        /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $model */
        if ($module) {
            $model = $module->model;
            $this->uploadable_type = trim($module->model, '\\');
        }

        if ($module && isset($this->element_id)) {
            $element = $model::remember(timer('very-long'))
                ->find($this->element_id);
        }

        if ($element) {
            $this->uploadable_id = $element->id;
            $this->element_uuid = $element->uuid;
        }

        return $this;

    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    //public function scopePopular($query) { return $query->where('votes', '>', 100); }
    //public function scopeWomen($query) { return $query->whereGender('W'); }
    /*
    Usage: $users = User::popular()->women()->orderBy('created_at')->get();
    */

    //public function scopeOfType($query, $type) { return $query->whereType($type); }
    /*
    Usage:  $users = User::ofType('member')->get();
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | If you want to add extra fields(that doesn't exist in database) to you model
    | you can use the getSomeAttribute() feature of eloquent.
    */
    public function getUrlAttribute() { return asset($this->path); }

    public function getDirAttribute() { return public_path().$this->path; }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    | Write model relations (belongsTo,hasMany etc) at the bottom the file
    */
    /**
     * Get the owning commentable model.
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function uploadable() { return $this->morphTo(); }

    /**
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     */
    public function linkedModule()
    {
        return $this->belongsTo(Module::class, 'module_id')->remember(timer('long'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator() { return $this->belongsTo(\App\User::class, 'created_by'); }

    /*
    |--------------------------------------------------------------------------
    | Todo: Helper functions
    |--------------------------------------------------------------------------
    | Todo: Write Helper functions in the UploadHelper trait.
    */

    /**
     * Deletes the previously uploaded file of the same type.
     * This function is useful for uploading profile pic
     * where there latest pic will discard the last one.
     */
    public function deletePreviousOfSameType()
    {
        if (isset($this->uploadable)) {
            $this->uploadable->uploads()
                ->where('type', $this->type)
                ->where('id', '!=', $this->id)
                ->delete();
        }
    }
}