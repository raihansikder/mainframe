<?php

namespace App\Http\Controllers;

use Hash;
use View;
use Request;
use Session;
use App\User;
use Response;
use Redirect;
use Validator;
use App\Upload;
use App\Invoice;
use App\Purchase;
use Illuminate\Support\Str;
use App\Classes\Reports\UsersReport;
use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class UsersController extends ModuleBaseController
{

    /*********************************************************************
     * Grid related functions.
     * Uncomment the functions to show modified grid.
     ********************************************************************/

    /**
     * Define grid SELECT statement and HTML column name.
     * @return array
     */
    public function gridColumns()
    {
        return [
            //['table.id', 'id', 'ID'], // translates to => table.id as id and the last one ID is grid colum header
            ["{$this->moduleName}.id", "id", "ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["{$this->moduleName}.email", "email", "Email"],
            ["{$this->moduleName}.group_titles_csv", "group_titles_csv", "Group"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
    }

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
     * In Controller store(), update() before filling the model input values are
     * transformed. Usually it is a good approach for converting arrays to json.
     * @param  array  $inputs
     * @return array
     */
    public function transformInputs($inputs = [])
    {
        /*
         * Convert an array input to csv
         ************************************************/
        // $arr_to_csv_inputs = [
        //     'partnercategory_ids'
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
        $arr_to_json_inputs = [
            'group_ids',
        ];

        foreach ($arr_to_json_inputs as $i) {
            if (isset($inputs[$i]) && is_array($inputs[$i])) {
                $inputs[$i] = json_encode($inputs[$i]);
            }

        }

        return $inputs;
    }

    // ****************** transform functions end ***********************

    /**
     * Shows an spyr element. Store an spyr element. Returns json response if ret=json is sent as url parameter.
     * Otherwise redirects to edit page where details is visible as filled up edit form.
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        /** @var \App\User $Model */
        /** @var \App\User $element */
        $moduleName = $this->moduleName;
        $Model = model($this->moduleName);
        //$elementName = str_singular($moduleName);
        //$ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process show
        # --------------------------------------------------------
        $element = $Model::find($id);

        if ( ! $element) { // If not found by id try by email.
            $element = User::where('email', $id)->first();
        }
        # --------------------------------------------------------

        if ($element) { // Check if the element exists
            $id = $element->id;
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
        return Redirect::route("$moduleName.edit", $id);
    }

    /**
     * Show spyr element edit form
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        /** @var \App\Http\Mainframe\Helpers\Modular\BaseModule\BaseModule $Model */
        /** @var \App\Http\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */
        // init local variables
        $moduleName = $this->moduleName;
        $Model = model($this->moduleName);
        $elementName = Str::singular($moduleName);
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------

        $element = $Model::find($id);

        if ( ! $element) { // If not found by id try by email.
            $element = User::where('email', $id)->first();
        }
        # --------------------------------------------------------

        if ($element) { // Check if the element you are trying to edit exists
            // $id = $element->id;
            if ($element->isViewable()) { // Check if the element is viewable
                return View::make('modules.base.form')
                    ->with('element', $elementName)//loads the singular module name in variable called $element = 'user'
                    ->with($elementName, $element)//loads the object into a variable with module name $user = (user object)
                    ->with('elementIsEditable', $element->isEditable());
            }

            // Not viewable by the user. Set error message and return value.
            //return showPermissionErrorPage("The element is not view-able by current user.");
            return View::make('template.blank')
                ->with('title', 'Permission denied!')
                ->with('body', 'The element is not view-able by current user. [ Error :: isViewable()]');
        }

        // The element does not exist. Set error and return values
        //return showGenericErrorPage("The item that you are trying to access does not exist or has been deleted");
        return View::make('template.blank')
            ->with('title', 'Not found!')
            ->with('body', 'The item that you are trying to access does not exist or has been deleted');
    }

    /**
     * @return \App\Http\Controllers\ModulebaseController|\App\Http\Controllers\UsersController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        /** @var \App\User $Model */
        /** @var \App\User $element */
        // init local variables
        // $moduleName = $this->moduleName;
        $Model = model($this->moduleName);

        //$elementName = str_singular($moduleName);
        //$ret = ret();
        # --------------------------------------------------------
        # Process store while creation
        # --------------------------------------------------------
        $validator = null;
        $inputs = $this->transformInputs(Request::all());
        $element = new $Model($inputs);
        if (hasModulePermission($this->moduleName, 'create')) { // check module permission
            $validator = Validator::make(Request::all(), $Model::rules($element), $Model::$customValidationMessages);

            // $element = new $Model;
            // $element->fill(Request::all());
            // $validator = $element->validateModel();

            if ($validator->fails()) {
                $ret = ret('fail', "Validation error(s) on creating {$this->module->title}.",
                    ['validation_errors' => json_decode($validator->messages(), true)]);
            } else {
                if ($element->isCreatable()) {

                    /************************************************************************
                     * If there is a password Hash it. And set a lfag just_changed_password
                     */
                    if (Request::get('password') !== null) {
                        $element->password = Hash::make(Request::get('password'));
                    }

                    // Generate new api token
                    if (Request::get('api_token_generate') === 'yes') {
                        $element->api_token = hash('sha256', randomString(10));
                    }

                    if ($element->save()) {
                        //$ret = ret('success', "$Model " . $element->id . " has been created", ['data' => $Model::find($element->id)]);
                        $ret = ret('success', "{$this->module->title} has been added", ['data' => $Model::find($element->id)]);
                        Upload::linkTemporaryUploads($element->id, $element->uuid);
                    } else {
                        $ret = ret('fail', "{$this->module->title} create failed.");
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
     * Update handler for spyr element.
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        /**
         * @var \App\User $Model
         * @var \App\User $element
         */
        $Model = model($this->moduleName);
        /** @noinspection PhpUnusedLocalVariableInspection */
        $ret = ret(); // load default return values
        # --------------------------------------------------------
        # Process update
        # --------------------------------------------------------
        $validator = null;
        if ($element = $Model::find($id)) { // Check if element exists.
            if ($element->isEditable()) { // Check if the element is editable.

                /******************************************************************************************
                 * Differently handled validation due to password, password_confirmation.
                 * - All password input must be paired with password_confirmation and go through validation.
                 * - User can be updated without password in input, in that case old password will retain.
                 */

                //dd(array_merge($element->getAttributes(), Request::all()));

                $validator = Validator::make(array_merge($element->getAttributes(), Request::all()), $Model::rules($element),
                    $Model::$customValidationMessages);
                //$validator = $element->validateModel();
                /******************************************************************************************/

                if ($validator->fails()) {
                    $ret = ret('fail', "Validation error(s) on updating {$this->module->title}.",
                        ['validation_errors' => json_decode($validator->messages(), true)]);
                } else {

                    $element->fill($this->transformInputs(Request::all()));

                    /**
                     * If there is a password Hash it. And set a fag just_changed_password
                     ***********************************************************************/
                    if (Request::get('password') !== null) {
                        $element->password = Hash::make(Request::get('password'));
                        if ($element->last_login_at) {
                            Session::push('just_changed_password', 1);
                        }
                    } else {
                        $element->password = $element->getOriginal('password');
                    }

                    // Generate new api token
                    if (Request::get('api_token_generate') === 'yes') {
                        $element->api_token = hash('sha256', randomString(10));
                    }
                    /************************************************************************/

                    if ($element->save()) { // Attempt to update/save.
                        $ret = ret('success', "{$this->module->title} has been updated", ['data' => $element]);
                    } else { // attempt to update/save failed. Set error message and return values.
                        $ret = ret('fail', "{$this->module->title} update failed.");
                    }
                }

            } else { // Element is not editable. Set message and return values.
                $ret = ret('fail', "{$this->module->title} is not editable by user.");
            }
        } else { // element does not exist(or possibly deleted). Set error message and return values
            $ret = ret('fail', "{$this->module->title} could not be found. The element is either unavailable or deleted.");
        }
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        return $this->jsonOrRedirect($ret, $validator, $element);
    }

    public function list()
    {
        /** @var \App\Http\Mainframe\Helpers\Modular\BaseModule\BaseModule $Model */
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

        // Eager load
        if (Request::has('name_email')) {
            $name_email = Request::get('name_email');

            $q = $q->where(function ($query) use ($name_email) {
                /** @var $query \Illuminate\Database\Query\Builder */
                $query->where('email', 'LIKE', "%$name_email%")
                    ->orWhere('name', 'LIKE', "%$name_email%");
            });
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
            /** @noinspection PhpUndefinedMethodInspection */
            $limit = $q->remember(cacheTime('none'))->count();
        }
        $q = $q->take($limit);

        /*********** Query construction ends ********************/

        // $data = $q->remember(cacheTime('none'))->get();
        $data = $q->get();
        $ret = ret('success', "{$this->moduleName} list", compact('data', 'total', 'offset', 'limit'));
        return Response::json(fillRet($ret));
    }

    /**
     * @param  \App\User  $user
     * @return string
     */
    public function invoices(User $user)
    {
        if ($user->isViewable()) {

            // $purchases_not_invoiced = Purchase::with(['recommender', 'partner'])
            //     ->where(function ($query) use ($user) {
            //         /** @var $query \Illuminate\Database\Query\Builder */
            //         $query->where('recommender_user_id', $user->id)
            //             ->orWhere('split_user_id', $user->id);
            //     })
            //     //->where('is_approved','=',1)
            //     //->where('charity_donation_in_charity_currency', '>', 0)
            //     ->whereNull('recommender_invoice_id')
            //     ->orderBy('created_at', 'asc')
            //     ->get();

            $purchases_not_invoiced = $user->invoicablePurchases();

            $invoices = Invoice::with(['recommender', 'partner'])->where('recommender_user_id', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();

            return view('modules.users.invoices')
                ->with('purchases_not_invoiced', $purchases_not_invoiced)
                ->with('invoices', $invoices)
                ->with('user', $user)
                ->with('gridColumns', $this->gridColumns());
        }
        return 'Permission denied';
    }

    /**
     * Transferwise account creation
     * @param $user User
     * @return \App\User|bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createTransferwiseAccount(User $user)
    {

        if ( ! user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }

        //if ($user->country_id != 187) {
        $user->createAndStoreTransferwiseAccount();
        return back();
        //}

    }

    /**
     * Create a Sendbird account for user.
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createSendbirdAccount(User $user)
    {
        if ( ! user()->isSuperUser()) {
            abort(403, 'Unauthorized action.');
        }

        $user->createSendBirdAccount();
        return back();
    }

    /**
     * Show and render report
     */
    public function report()
    {
        if (hasModulePermission($this->moduleName, 'report')) {
            $report = new UsersReport($this->reportDataSource(), $this->reportViewBaseDir());
            return $report->show();
        }
        return view('template.blank')->with('title', 'Permission denied!')
            ->with('body', "You don't have permission [ ".$this->moduleName.".report]");
    }

}
