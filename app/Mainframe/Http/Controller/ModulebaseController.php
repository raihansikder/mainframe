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
use App\Mainframe\Traits\IsoGridDatatable;
use App\Classes\Reports\DefaultModuleReport;

/**
 * Class ModulebaseController
 */
class ModulebaseController extends Controller
{
    use IsoOutput;
    use IsoGridDatatable;

    protected $module_name;    // Stores module name with lowercase and plural i.e. 'superheros'.
    protected $module;         // Stores module name with lowercase and plural i.e. 'superheros'.
    protected $query;          // Stores default DB query to create the grid. Used in grid() function.
    protected $grid_columns;   // Columns to show, this array is set form modules individual controller.
    protected $report_data_source;  // loads the model name

    /**
     * Constructor for this class is very important as it boots up necessary features of
     * Spyr module. First of all, it load module related meta information, then based
     * on context check(tenant context) it loads the tenant id. The it constructs the default
     * grid query and also add tenant context to grid query if applicable. Finally it
     * globally shares a couple of variables $module_name, $mod to all views rendered
     * from this controller
     */
    public function __construct()
    {

        $this->module_name = controllerModule(get_class($this));
        $this->module = Module::where('name', $this->module_name)->remember(cacheTime('long'))->first();

        if ($tenant_id = inTenantContext($this->module_name)) {
            Request::merge([tenantIdField() => $tenant_id]);
        }

        View::share([
            'module_name' => $this->module_name,
            'mod' => $this->module
        ]);
    }

    /**
     * Index/List page to show grid
     * This controller method is responsible for rendering the view that has the default
     * spyr module grid.
     *
     * @return \App\Http\Controllers\ModulebaseController|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (hasModulePermission($this->module_name, 'view-list')) {
            if (Request::get('ret') === 'json') {
                return $this->list();
            }
            $view = 'modules.base.grid';
            if (View::exists('modules.'.$this->module_name.'.grid')) {
                $view = 'modules.'.$this->module_name.'.grid';
            }

            return view($view)->with('grid_columns', $this->gridColumns());
        }
        abort(403);
        // return View::make('template.blank')
        //     ->with('title', 'Permission denied!')
        //     ->with('body', "You don't have permission [ ".$this->module_name.'.view-list]');
    }

    /**
     * Shows an element create form.
     *
     * @return \Illuminate\Contracts\View\View|\View
     * @throws \Exception
     */
    public function create()
    {

        if (hasModulePermission($this->module_name, 'create')) {
            $uuid = Request::old('uuid') ?: uuid();

            return View::make('modules.base.form')->with('uuid', $uuid)->with('element_editable', true);
        }

        abort(403);

        // return View::make('template.blank')
        //     ->with('title', 'Permission denied!')
        //     ->with('body', "You don't have permission [ ".$this->module_name.'.create]');
    }

    /**
     * Store an spyr element. Returns json response if ret=json is sent as url parameter. Otherwise redirects
     * based on the url set in redirect_success|redirect_fail
     *
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @var \App\Basemodule $element
     * @var \App\Superhero $Model
     */
    public function store()
    {

        $module_name = $this->module_name;
        $Model = model($this->module_name);
        $validator = null;
        $element = new $Model($this->transformInputs(Request::all()));

        if (hasModulePermission($this->module_name, 'create')) {

            $validator = Validator::make(
                Request::all(),
                $Model::rules($element),
                $Model::$custom_validation_messages
            );

            if ($validator->fails()) {

                $ret = ret('fail',
                    "Validation error(s) on creating {$this->module->title}.",
                    ['validation_errors' => json_decode($validator->messages(), true)]
                );

            } else {
                if ($element->isCreatable()) {
                    try {
                        if ($element->save()) {
                            $ret = ret('success', "{$this->module->title} has been added", ['data' => $Model::find($element->id)]);
                            Upload::linkTemporaryUploads($element->id, $element->uuid);
                        } else {
                            $ret = ret('fail', "{$this->module->title} create failed.");
                        }
                    } catch (Exception $e) {
                        $ret = ret('fail', $e->getMessage());
                    }
                } else {
                    $ret = ret('fail', "{$this->module->title} could not be saved. (error: isCreatable())");
                }
            }
        } else {
            $ret = ret('fail', "User does not have create permission for {$this->module->title} ");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        return $this->jsonOrRedirect($ret, $validator, $element);
    }

    /**
     * Shows an spyr element. Store an spyr element. Returns json response if ret=json is sent as url parameter.
     * Otherwise redirects to edit page where details is visible as filled up edit form.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        $module_name = $this->module_name;
        $Model = model($this->module_name);
        //$element_name = str_singular($module_name);
        //$ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process show
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // Check if the element exists
            if ($element->isViewable()) { // Check if the element is viewable
                //$ret = ret('success', "$Model " . $element->id . " found", ['data' => $element]);
                $ret = ret('success', '', ['data' => $element]);
            } else { // not viewable
                $ret = ret('fail', "{$this->module->title} is not viewable.");
            }
        } else { // The element was not found or has been deleted.
            $ret = ret('fail', "{$this->module->title} could not be found. The element is either unavailable or deleted.");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if (Request::get('ret') === 'json') {
            return Response::json(fillRet($ret));
        }

        if ($ret['status'] === 'fail') { // Show failed. Redirect to fail path(url)
            return Redirect::route('home');
        }

        // Redirect to edit path
        return Redirect::route("$module_name.edit", $id);
    }

    /**
     * Show spyr element edit form
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables
        $module_name = $this->module_name;
        $Model = model($this->module_name);
        $element_name = Str::singular($module_name);
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // Check if the element you are trying to edit exists
            if ($element->isViewable()) { // Check if the element is viewable
                return View::make('modules.base.form')
                    ->with('element', $element_name)//loads the singular module name in variable called $element = 'user'
                    ->with($element_name, $element)//loads the object into a variable with module name $user = (user object)
                    ->with('element_editable', $element->isEditable());
            }

            // Not viewable by the user. Set error message and return value.
            //return showPermissionErrorPage("The element is not view-able by current user.");

            abort(403);
            // return View::make('template.blank')
            //     ->with('title', 'Permission denied!')
            //     ->with('body', 'The element is not view-able by current user. [ Error :: isViewable()]');
        }

        // The element does not exist. Set error and return values
        //return showGenericErrorPage("The item that you are trying to access does not exist or has been deleted");
        return View::make('template.blank')
            ->with('title', 'Not found!')
            ->with('body', 'The item that you are trying to access does not exist or has been deleted');
    }

    /**
     * Update handler for spyr element.
     *
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @var \App\Basemodule $element
     * @var \App\Basemodule $Model
     */
    public function update($id)
    {

        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables
        $Model = model($this->module_name);
        $ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process update
        # --------------------------------------------------------
        $validator = null;
        if ($element = $Model::find($id)) { // Check if element exists.
            if ($element->isEditable()) { // Check if the element is editable.

                $element->fill($this->transformInputs(Request::all()));
                $validator = $element->validateModel();

                if ($validator->fails()) {
                    $ret = ret('fail',
                        "Validation error(s) on updating {$this->module->title}.",
                        ['validation_errors' => json_decode($validator->messages(), true)]
                    );

                } else {
                    if ($element->save()) {

                        $ret = ret('success', "{$this->module->title} has been updated", ['data' => $element]);

                    } else {

                        $ret = ret('fail', "{$this->module->title} update failed.");

                    }
                }

            } else {

                $ret = ret('fail', "{$this->module->title} is not editable by user.");

            }

        } else {

            $ret = ret('fail', "{$this->module->title} could not be found. The element is either unavailable or deleted.");

        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        return $this->jsonOrRedirect($ret, $validator, $element);
    }

    /**
     * Delete spyr element.
     *
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables
        // $module_name = $this->module_name;
        $Model = model($this->module_name);
        // $element_name = str_singular($module_name);
        // $ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process delete
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // check if the element exists
            if ($element->isDeletable()) { // check if the element is editable
                if ($element->delete()) { // attempt delete and set success message return values
                    $ret = ret('success', "{$this->module->title} has been deleted");
                } else { // handle delete failure and set error message and return values
                    $ret = ret('fail', "{$this->module->title} delete failed.");
                }
            } else { // element is not editable(which also means not deletable)
                $ret = ret('fail', "{$this->module->title} could not be deleted.");
            }
        } else { // the element was not fonud. Set error message and return value
            $ret = ret('fail', "{$this->module->title} could not be found. The element is either unavailable or deleted.");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if (Request::get('ret') === 'json') {
            return Response::json($ret = fillRet($ret));
        }

        if ($ret['status'] === 'fail') { // Delete failed. Redirect to fail path(url)
            $redirect = Request::has('redirect_fail') ? Redirect::to(Request::get('redirect_fail')) : Redirect::back();
        } else {
            if (Request::has('redirect_success')) {
                $redirect = Redirect::to(Request::get('redirect_success'));
            } else {
                return View::make('template.blank')
                    ->with('title', 'Delete success!')
                    ->with('body', 'The item that you are trying to access does not exist or has been deleted');
            }
        }

        return $redirect;
    }

    /**
     * Restore a soft-deleted.
     *
     * @param  null  $id
     * @return $this
     */
    public function restore($id = null)
    {
        //return showGenericErrorPage("[$id] can not be restored. Restore feature is disabled");
        return View::make('template.blank')
            ->with('title', 'Restore not allowed')
            ->with('body', 'The item '.$id.' can not be restored');
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
        $ret = ret('success', "{$this->module_name} list", $this->listData());

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
        $Model = model($this->module_name);

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
        $Model = model($this->module_name);
        $text_fields = $Model::$text_fields;
        //$module_sys_name = $this->module_name;

        /** @var \App\Basemodule $q */
        /** @var \App\Basemodule $Model */
        // $q = $q->where('is_active', 1);

        if (inTenantContext($this->module_name)) {
            $q = injectTenantIdInModelQuery($this->module_name, $q);
        }

        # Generic API return
        if (Request::has('updatedSince')) {
            $q = $q->where('updated_at', '>=', Request::get('updatedSince'));
        }
        if (Request::has('createdSince')) {
            $q = $q->where('created_at', '>=', Request::get('createdSince'));
        }
        if (Request::has('updatedAt')) {
            $q = $q->whereRaw('DATE(updated_at) = '."'".Request::get('updatedAt')."'");
        }
        if (Request::has('createdAt')) {
            $q = $q->whereRaw('DATE(created_at) = '."'".Request::get('createdAt')."'");
        }

        if (Request::has('fieldName') && Request::has('fieldValue')) {
            $fieldName = Request::get('fieldName');
            $fieldValue = Request::get('fieldValue');
            $q = $q->where($fieldName, $fieldValue);
        }

        $q_fields = columns($this->module_name); // Get all table field names
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
     * @return \Illuminate\Http\JsonResponse|ModulebaseController
     */
    public function changes($id)
    {
        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables

        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        $Model = model($this->module_name);
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
        return $this->report_data_source ?? DB::getTablePrefix().$this->module_name;
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

        // Override default if a module specific report blade exists in location  "{module_name}.report.result"
        if (View::exists('modules.'.$this->module_name.'.report.results')) {
            $base_dir = 'modules.'.$this->module_name.'.report';
        }

        return $base_dir;
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->module_name, 'report')) {
            $report = new DefaultModuleReport();
            $report->data_source = $this->reportDataSource();
            $report->base_dir = $this->reportViewBaseDir();

            return $report->show();
        }

        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->module_name.'.report]');
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
