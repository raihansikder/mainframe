<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Uploads;

use Storage;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class UploadController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('uploads');
    }

    /**
     * @param  null  $class
     * @return UploadDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new UploadDatatable($this->moduleName);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request)
    {
        if (! user()->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        if (! $file = $this->getFile()) {
            return $this->failed('No file in http request');
        }

        // if($dimensions = $this->getImageDimension($file)){
        //     $this->element->width = $dimensions['width'];
        //     $this->element->height = $dimensions['height'];
        // }

        if (! $uploadPath = $this->handleUpload($file)) {
            return $this->failed('Can not move file to destination from tmp');
        }

        $this->element->name = $file->getClientOriginalName();
        $this->element->path = $uploadPath;
        $this->attemptStore();

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();
    }

    /**
     * Get the uploaded file from request
     *
     * @return null|array|bool|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]
     */
    public function getFile()
    {
        $request = $this->request;
        $fileField = $request->get('file_field', 'file');

        if (! $request->hasFile($fileField)) {
            return false;
        }

        return $request->file($fileField);
    }

    /**
     * Physically move the file to a location.
     *
     * @param $file
     * @return bool|string
     */
    public function handleUpload(UploadedFile $file)
    {
        $path = conf('mainframe.config.upload_root');

        // todo: resolve tenant file root location

        //$dimensions = $this->getImageDimension($file);

        $uniqueFileName = Str::random(8)."_".$file->getClientOriginalName();
        // Upload to local
        if (env('APP_ENV') === 'local') {
            $relativePath = $path.$uniqueFileName;
            if ($file->move(public_path().$path, $relativePath)) {
                return $relativePath;
            }
        }

        // Upload to AWS
        if ($awsPath = Storage::disk('s3')->putFile(env('APP_ENV'), $file, 'public')) {
            return Storage::disk('s3')->url($awsPath);
        }

        return false;
    }

    /** @noinspection PhpUnused */

    /**
     * Get dimension of image
     *
     * @param $file
     * @return array|bool
     */
    public function getImageDimension(UploadedFile $file)
    {
        if (isImageExtension($file->getClientOriginalExtension())) {
            [$width, $height] = getimagesize($file->getPathname());

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
            ->remember(cacheTime('long'))->first()) {
            return Response::download(public_path().$upload->path);
        }

        return $this->notFound();
    }

}
