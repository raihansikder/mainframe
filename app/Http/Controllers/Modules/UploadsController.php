<?php

namespace App\Http\Controllers;

use Request;
use Storage;
use Response;
use Redirect;
use App\Mainframe\Modules\Uploads\Upload;
use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class UploadsController extends ModuleBaseController
{

    /**
     * Stores the image file in server
     *
     * @param  string  $input_name  file field name
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store($input_name = 'file')
    {
        $input_name = Request::has('input_name') ? Request::get('input_name') : $input_name;

        /** @var \App\Http\Mainframe\Helpers\Modular\BaseModule\BaseModule $Model */
        /** @var \App\Http\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */
        // init local variables
        $moduleName = $this->moduleName;
        $Model = model($this->moduleName);

        // $ret = ret();
        # --------------------------------------------------------
        # Process store while creation
        # --------------------------------------------------------
        if (hasModulePermission($this->moduleName, 'create')) { // check module permission
            $element = new $Model(Request::all());
            // validate
            $validator = \Validator::make(Request::all(), $Model::rules($element), $Model::$customValidationMessages);

            if ($validator->fails()) {
                $ret = ret('fail', "Validation error(s) on creating {$this->module->title}.",
                    ['validation_errors' => json_decode($validator->messages(), true)]);
            } else {
                if (Request::hasFile($input_name)) {
                    $uuid = uuid();
                    $file = Request::file($input_name);
                    // $unique_name = $uuid . "." . $file->getClientOriginalExtension();
                    $unique_name = 'test_'.randomString()."_".$file->getClientOriginalName();
                    $path = conf('var.file-upload-root');

                    // Resolve tenant directory
                    $tenant_id = null;
                    if (tenantUser()) { // Obtain tenant_id from logged in user
                        $tenant_id = userTenantId();
                    } else {
                        if (Request::has('tenant_id') && strlen(Request::get('tenant_id'))) { // Obtain tenant_id from input
                            // if (Tenant::remember(cacheTime('long'))->find(Request::get('tenant_id')))
                            //     $tenant_id = Request::get('tenant_id');
                        }
                    }
                    if ($tenant_id) {
                        $path .= $tenant_id."/";
                    }

                    // if the file is image file then send the width and height also. This is useful for
                    // plugins like image cropper.
                    $width = $height = null;
                    if (isImageExtension($file->getClientOriginalExtension())) {
                        list($width, $height) = getimagesize($file->getPathname());
                    }

                    //$aws_path = '/test/' . $unique_name;
                    //$aws_path = Storage::disk('s3')->put($aws_file_path, file_get_contents($file), 'public');

                    /**********************************************
                     * Store in AWS S3
                     **********************************************/
                    $upload_success = false;
                    if (env('APP_ENV') != 'local') {
                        $aws_path = Storage::disk('s3')->putFile(env('APP_ENV'), $file, 'public');
                        if ($aws_path) {
                            $upload_success = true;
                            $aws_url = Storage::disk('s3')->url($aws_path);
                            $element->path = $aws_url;
                        }
                    } else {
                        /**********************************************
                         * Store in local directory
                         **********************************************/
                        if ($upload_success = $file->move(public_path().$path, $unique_name)) {
                            $element->path = $path.$unique_name; //save the full path including file to easy retrieve
                        }
                    }

                    if ($upload_success) {
                        $element->uuid = $uuid;
                        $element->name = $file->getClientOriginalName();
                        //$element->path = $path . $unique_name; //save the full path including file to easy retrieve
                        if ($element->save()) {
                            // data saved in database
                            //$upload = Upload::find($upload->id);
                            $payload = [
                                'data' => $element,
                                'path' => asset($element->path),
                                'url' => asset($element->path),   // required for croppic image cropper
                                "width" => $width,                 // required for croppic image cropper
                                "height" => $height                 // required for croppic image cropper
                            ];
                            $ret = ret('success', "File has been uploaded", $payload);
                        } else {
                            setError("File could not be uploaded for some reason.");
                            $ret = ret('fail', "File could not be uploaded for some reason.");
                        }
                    } else {
                        $ret = ret('fail', "Upload error: Unable to move file from tmp to destination directory, or aws.");
                    }
                } else {
                    $ret = ret('fail', "No file selected.");
                }
            }
        } else {
            $ret = ret('fail', "User does not have create permission for module: {$this->module->title} ");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if (Request::get('ret') == 'json') {
            $ret = fillRet($ret); // fill with session values(messages, errors, success etc) and redirect
            if ($ret['status'] == 'success' && (isset($ret['redirect']) && $ret['redirect'] == '#new')) {
                $ret['redirect'] = route("$moduleName.edit", $$element->id);
            }

            return Response::json($ret);
        }

        if ($ret['status'] == 'fail') {
            $redirect = Redirect::to(Request::get('redirect_fail'))->withInput();
            if (isset($validator)) {
                $redirect = $redirect->withErrors($validator);
            }
        } else {
            if (Request::get('redirect_success') == '#new') {
                $redirect = Redirect::route("$moduleName.edit", $$element->id);
            } else {
                $redirect = Redirect::to(Request::get('redirect_success'));
            }
        }

        return $redirect;
    }

    /**
     * Downloads the file with HTTP response to hide the file url
     *
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($uuid)
    {
        if ($upload = Upload::whereUuid($uuid)->first()) {
            $response = Response::download(public_path().$upload->path);

            //ob_end_clean();
            return $response;
        }
    }

}
