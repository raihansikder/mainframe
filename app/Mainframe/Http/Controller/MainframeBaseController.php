<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Mainframe\Controllers;

use DB;
use View;
use Request;
use Redirect;
use Response;
use Exception;
use Validator;
use App\Module;
use App\Upload;
use Illuminate\Support\Str;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\IsoGridDatatable;
use App\Classes\Reports\DefaultModuleReport;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput;
    use IsoGridDatatable;


    public function __construct()
    {



    }

    /**
     * Returns a collection of objects as Json
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Illuminate\Database\Eloquent\Builder $q
     * @var \App\Basemodule $Model
     */
    public function list()
    {
        $ret = ret('success', "{$this->moduleName} list", $this->listData());

        return Response::json(fillRet($ret));
    }

    /**
     * Obtain data
     *
     * @return array
     */
    public function listData()
    {
        /** @var \App\Basemodule $Model */
        /** @var \Illuminate\Database\Eloquent\Builder $q */
        $Model = model($this->moduleName);

        if (Request::has('columns')) {
            $q = $Model::select(explode(',', Request::get('columns')));
        } else {
            $q = new $Model;
        }

        // Eager load
        if (Request::has('with')) {
            $with = Request::get('with');
            $q = $q->with(explode(',', $with));
        }
        // Force is_active = 1
        $q->where('is_active', 1);

        // Construct query based on filter param
        $q = $this->filterQueryConstructor($q);

        // Get total count with out offset and limit.
        $total = $q->count();

        // Sort
        $sort_by = 'created_at';
        if (Request::has('sort_by')) {
            $sort_by = Request::get('sort_by');

        }
        $sort_order = 'desc';
        if (Request::has('sort_order')) {
            $sort_order = Request::get('sort_order');
        }
        $q = $q->orderBy($sort_by, $sort_order);

        // set offset
        $offset = 0;
        if (Request::has('offset')) {
            $offset = Request::get('offset');
            $q = $q->skip($offset);
        }

        //set limit
        $limit = $max_limit = 20;
        if (Request::has('limit') && Request::get('limit') <= $max_limit) {
            $limit = Request::get('limit');
        }
        // Limit override - Force all data with no limit.
        if (Request::get('force_all_data') === 'true') {
            $limit = $q->remember(cacheTime('none'))->count();
        }
        $q = $q->take($limit);

        /*********** Query construction ends ********************/

        // $data = $q->remember(cacheTime('none'))->get();
        $data = $q->get();

        return compact('data', 'total', 'offset', 'limit');
    }

    /**
     * Json return query constructor
     *
     * @param $q \Illuminate\Database\Query\Builder
     * @return \App\Basemodule
     */
    public function filterQueryConstructor($q)
    {
        $Model = model($this->moduleName);
        $text_fields = $Model::$text_fields;
        //$module_sys_name = $this->moduleName;

        /** @var \App\Basemodule $q */
        /** @var \App\Basemodule $Model */
        // $q = $q->where('is_active', 1);

        if (inTenantContext($this->moduleName)) {
            $q = injectTenantIdInModelQuery($this->moduleName, $q);
        }

        # Generic API return
        if (Request::has('updated_since')) {
            $q = $q->where('updated_at', '>=', Request::get('updatedSince'));
        }
        if (Request::has('created_since')) {
            $q = $q->where('created_at', '>=', Request::get('createdSince'));
        }

        if (Request::has('fieldName') && Request::has('fieldValue')) {
            $fieldName = Request::get('fieldName');
            $fieldValue = Request::get('fieldValue');
            $q = $q->where($fieldName, $fieldValue);
        }

        $q_fields = columns($this->moduleName); // Get all table field names
        foreach (Request::all() as $name => $val) { // Loop through all the fields in request
            if (in_array($name, $q_fields)) { // If field is available
                if (is_array($val) && count($val)) { // If array check whereIn()
                    $temp = removeEmptyVals($val);
                    if (count($temp)) {
                        $q = $q->whereIn($name, $temp);
                    }
                } else {
                    if (strlen($val) && strpos($val, ',') !== false) { // If CSV then convert to array and check whereIn()
                        $q = $q->whereIn($name, explode(',', $val));
                    } else {
                        if (strlen($val)) {

                            if ($val === 'null') { // Check if value is null
                                $q = $q->whereNull($name);
                            } else {
                                if (in_array($name, $text_fields)) {
                                    $q = $q->where($name, 'LIKE', "%$val%"); // For select2
                                } else {
                                    $q = $q->where($name, $val); // Before select2
                                }
                            }
                        }
                    }
                }
            }
        }

        return $q;

    }

    /**
     * Show all the changes/change logs of an item
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|ModuleBaseController
     */
    public function changes($id)
    {
        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables

        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        $Model = model($this->moduleName);
        //$ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // Check if the element you are trying to edit exists
            if ($element->isViewable()) { // Check if the element is viewable
                $changes = $element->changes;
                $ret = ret('success', '', ['data' => $changes]);
            } else { // Not viewable by the user. Set error message and return value.
                $ret = ret('fail', 'The element is not view-able by current user.');
                //return showPermissionErrorPage("The element is not view-able by current user.");
            }
        } else { // The element does not exist. Set error and return values
            $ret = ret('fail', 'The item that you are trying to access does not exist or has been deleted');
            //return showGenericErrorPage("The item that you are trying to access does not exist or has been deleted");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if (Request::get('ret') === 'json') {
            return Response::json(fillRet($ret));
        }

        if ($ret['status'] === 'fail') { // Update failed. Redirect to fail path(url)
            return showGenericErrorPage($ret['message']);
        }

        // Update successful. Redirect to success path(url)

        /** @var array $changes */
        return View::make('modules.base.changes')
            ->with('changes', $changes);
    }

    /**
     * Get data source of report
     *
     * @return null|string
     */
    public function reportDataSource()
    {
        return $this->reportDataSource ?? DB::getTablePrefix().$this->moduleName;
    }

    /**
     * Get base directory of blade views
     *
     * @return string
     */
    public function reportViewBaseDir()
    {
        /** @var  $base_dir  string Define path to results view */
        $base_dir = 'modules.base.report';

        // Override default if a module specific report blade exists in location  "{moduleName}.report.result"
        if (View::exists('modules.'.$this->moduleName.'.report.results')) {
            $base_dir = 'modules.'.$this->moduleName.'.report';
        }

        return $base_dir;
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->moduleName, 'report')) {
            $report = new DefaultModuleReport();
            $report->data_source = $this->reportDataSource();
            $report->base_dir = $this->reportViewBaseDir();

            return $report->show();
        }

        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->moduleName.'.report]');
    }

    /**
     * Transforms inputs to a Model compatible format.
     *
     * @param  array  $inputs
     * @return array
     */
    public function transformInputs($inputs = [])
    {
        /*
         * Convert an array input to csv
         ************************************************/
        // $arr_to_csv_inputs = [
        //     'array_input_field_name'
        // ];
        //
        // foreach ($arr_to_csv_inputs as $i){
        //     if(isset($inputs[$i]) && is_array($inputs[$i])){
        //         $inputs[$i] = arrayToCsv($inputs[$i]);
        //     }else{
        //         $inputs[$i] = null;
        //     }
        // }

        /*
         * Convert an array input to json
         ************************************************/
        // $arr_to_json_inputs = [
        //     'array_input_field_name'
        // ];
        //
        // foreach ($arr_to_json_inputs as $i){
        //
        //     if(isset($inputs[$i]) && is_array($inputs[$i])){
        //         $inputs[$i] = json_encode($inputs[$i]);
        //     }else{
        //         $inputs[$i] = null;
        //     }
        // }

        return $inputs;
    }
}
