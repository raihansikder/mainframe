<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Uploads;

use Response;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        if (! user()->cannot('create')) {
            return $this->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        if ($this->attemptStore()->isSuccess()) {
            $this->handleUpload();
        }

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();
    }

    public function handleUpload()
    {
        $request = $this->request;
        $fileField = $request->get('file_field', 'file');

        if (! $request->hasFile($fileField)) {
            $this->fail('No file in http request field:'.$fileField);
        }


    }

    /**
     * Downloads the file with HTTP response to hide the file url
     *
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse|void
     */
    public function download($uuid)
    {
        if ($upload = Upload::whereUuid($uuid)->first()) {
            return Response::download(public_path().$upload->path);
        }

        return $this->notFound();
    }

}
