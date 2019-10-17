<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Response;
use App\Upload;
use Storage;
use App\Http\Mainframe\Controllers\ModuleBaseController;

class UploadsController extends ModuleBaseController
{

    /*********************************************************************
     * Grid related functions.
     * Uncomment the functions to show modified grid.
     ********************************************************************/

    /**
     * Define grid SELECT statement and HTML column name.
     * @return array
     */
    // public function gridColumns()
    // {
    //     return [
    //         //['table.id', 'id', 'ID'], // translates to => table.id as id and the last one ID is grid colum header
    //         ["{$this->moduleName}.id", "id", "ID"],
    //         ["{$this->moduleName}.name", "name", "Name"],
    //         ["updater.name", "user_name", "Updater"],
    //         ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
    //         ["{$this->moduleName}.is_active", "is_active", "Active"]
    //     ];
    // }

    /**
     * Construct SELECT statement based
     * @return array
     */
    // public function selectColumns()
    // {
    //     $select_cols = [];
    //     foreach ($this->gridColumns() as $col)
    //         $select_cols[] = $col[0] . ' as ' . $col[1];
    //
    //     return $select_cols;
    // }

    /**
     * Define Query for generating results for grid
     * @return \Illuminate\Database\Query\Builder|static
     */
    // public function sourceTables()
    // {
    //     return DB::table($this->moduleName)
    //         ->leftJoin('users as updater', $this->moduleName . '.updated_by', 'updater.id');
    // }

    /**
     * Define Query for generating results for grid
     * @return $this|mixed
     */
    // public function gridQuery()
    // {
    //     $query = $this->sourceTables()->select($this->selectColumns());
    //
    //     // Inject tenant context in grid query
    //     if ($tenant_id = inTenantContext($this->moduleName)) {
    //         $query = injectTenantIdInModelQuery($this->moduleName, $query);
    //     }
    //
    //     // Exclude deleted rows
    //     $query = $query->whereNull($this->moduleName . '.deleted_at'); // Skip deleted rows
    //
    //     return $query;
    // }

    /**
     * Modify datatable values
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    // public function datatableModify($dt)
    // {
    //     // First set columns for  HTML rendering
    //     $dt = $dt->rawColumns(['id', 'name', 'is_active']); // HTML can be printed for raw columns
    //
    //     // Next modify each column content
    //     $dt = $dt->editColumn('name', '<a href="{{ route(\'' . $this->moduleName . '.edit\', $id) }}">{{$name}}</a>');
    //     $dt = $dt->editColumn('id', '<a href="{{ route(\'' . $this->moduleName . '.edit\', $id) }}">{{$id}}</a>');
    //     $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
    //
    //     return $dt;
    // }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    // public function grid()
    // {
    //     // Make datatable
    //     /** @var \Yajra\DataTables\DataTableAbstract $dt */
    //     $dt = datatables($this->gridQuery());
    //     $dt = $this->datatableModify($dt);
    //     return $dt->toJson();
    // }

    // ****************** Grid functions end *********************************

    /**
     * Stores the image file in server
     * @param  string  $input_name  file field name
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store($input_name = 'file')
    {

        $input_name = Request::has('input_name') ? Request::get('input_name') : $input_name;

        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables
        $moduleName = $this->moduleName;
        $Model       = model($this->moduleName);

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
                    $path        = conf('var.file-upload-root');

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

                    }else {
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
                            $ret     = ret('success', "File has been uploaded", $payload);
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

    // public function destroy($id){
    //     $moduleName = $this->moduleName;
    //     $Model = model($this->moduleName);
    //     $element = new $Model(Request::all());
    //     $user = Request::get('users');
    //     if(isset($user->uploads[0]['id'])){
    //         $uploads = $user->uploads[0];
    //         $image_path =$uploads['path'];
    //         if (env('APP_ENV') != 'local') {
    //             if(Storage::disk('s3')->exists($image_path)) {
    //                 $delete_image  = Storage::disk('s3')->delete($image_path);
    //             }else{
    //                 $delete_image = 0;
    //             }
    //         } else {
    //             if(\File::exists(public_path($image_path))){
    //                 $delete_image = \File::delete(public_path($image_path));
    //             }else{
    //                 $delete_image = 0;
    //             }
    //         }
    //         if($delete_image == 1){
    //             $delete = $element->find($id);
    //             $delete->delete();
    //             $ret = ret('success', "Profile Pic deleted successfully");
    //         }else{
    //             $ret = ret('fail', "Profile Pic could not be deleted for some reason.");
    //         }
    //     }else{
    //         $ret = ret('fail', "No Profile Pic exists.");
    //     }
    //     $ret = fillRet($ret); // fill with session values(messages, errors, success etc) and redirect
    //     return Response::json($ret);
    // }
}
