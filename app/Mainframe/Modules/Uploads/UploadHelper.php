<?php

namespace App\Mainframe\Modules\Uploads;

use File;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;

trait UploadHelper
{
    /**
     * get all uploads under a module
     *
     * @param  array  $entry_uuid
     * @param  string  $filter
     * @return mixed
     */
    public static function getList($entry_uuid, $filter = '') // TODO : filter logic incomplete
    {
        $uploads = Upload::where('element_uuid', $entry_uuid);

        return $uploads->orderBy('created_at', 'DESC')->get();
    }

    /**
     * During creation of a module entry there is no id but still files can be uploaded.
     * At this time system creates an uuid and stores files against that uuid.
     * Once the creation is successful
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
     * This function is useful for plugins that needs the file location in the operating system
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

        if (! File::exists($icon_path)) {
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
}