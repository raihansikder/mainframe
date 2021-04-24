<?php

namespace App\Mainframe\Modules\Uploads\Traits;

use App\Mainframe\Modules\Uploads\UploadController;
use App\Upload;
use Illuminate\Http\Request;

/** @mixin UploadController $this */
trait UploadControllerTrait
{
    /** @var null|array|bool|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[] */
    public $file;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request)
    {
        if (!user()->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        if (!$this->file = $this->getFile()) {
            return $this->fail('No file in http request');
        }

        $this->element = $this->model; // Create an empty model to be stored.
        $this->fill();
        $this->element->fillModuleAndElement('uploadable');

        if (!$path = $this->attemptUpload()) {
            return $this->fail('Can not move file to destination from tmp');
        }

        $this->element->name = $this->file->getClientOriginalName();
        $this->element->path = $path;

        // if($dimensions = $this->getImageDimension($file)){
        //     $this->element->width = $dimensions['width'];
        //     $this->element->height = $dimensions['height'];
        // }

        $this->attemptStore();

        if ($this->isValid()) {
            $this->element->unsetRelations();
        } else {
            $this->element = null;
        }

        return $this->load($this->element)->send();
    }

    /**
     * Get the uploaded file from request
     *
     * @return null|array|bool|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]
     */
    public function getFile()
    {
        $fileRequestField = request()->get('file_field', 'file');

        if (!request()->hasFile($fileRequestField)) {
            return false;
        }

        $this->file = request()->file($fileRequestField);

        return $this->file;
    }

    /**
     * Physically move the file to a location.
     *
     * @return bool|string
     */
    public function attemptUpload()
    {

        return $this->attemptLocalUpload();
        // return $this->attemptAwsUpload();

    }

    /**
     * Upload in the same local server
     *
     * @return string
     */
    public function attemptLocalUpload()
    {
        $directory = $this->uploadDirectory();
        $fileRelativePath = $this->localRelativePath();

        if ($this->file->move($directory, $fileRelativePath)) {
            return $fileRelativePath;
        }
    }

    /**
     * Upload in aws
     *
     * @return mixed
     */
    public function attemptAwsUpload()
    {
        if ($awsPath = \Storage::disk('s3')->putFile(env('APP_ENV'), $this->file, 'public')) {
            return \Storage::disk('s3')->url($awsPath);
        }
    }

    /**
     * Relative path to local directory inside public
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function uploadDirectory()
    {
        // public/files/{tenant_id}/2021/12/25
        $dir = date('Y').'/'.date('m').'/'.date('d');

        if ($uploadable = optional($this->element->uploadable)->tenant_id) {
            $dir = $uploadable->tenant_id."/{$dir}";
        } elseif ($this->tenant) {
            $dir = $this->tenant->id."/{$dir}";
        }

        $path = config('mainframe.config.upload_root')."/{$dir}";

        return $path;
    }

    public function localRelativePath()
    {
        return '/'.trim($this->uploadDirectory(), '/').'/'.$this->uniqueFileName();
    }

    /**
     * Generate unique file name
     *
     * @return string
     */
    public function uniqueFileName()
    {
        return \Str::random(8)."_".$this->file->getClientOriginalName();
    }

    /**
     * Get dimension of image
     *
     * @return array|bool
     */
    public function getImageDimension()
    {
        if (isImageExtension($this->file->getClientOriginalExtension())) {
            [$width, $height] = getimagesize($this->file->getPathname());

            return ['width' => $width, 'height' => $height];
        }

        return false;
    }

    /**
     * Downloads the file with HTTP response to hide the file url
     *
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse|void
     */
    public function download($uuid)
    {
        if ($upload = Upload::where('uuid', $uuid)
            ->remember(timer('long'))->first()) {
            return \Response::download(public_path().$upload->path);
        }

        return $this->notFound();
    }
}