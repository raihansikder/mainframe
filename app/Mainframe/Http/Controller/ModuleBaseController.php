<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Mainframe\Controllers;

use View;
use Request;
use Redirect;
use Response;
use Exception;
use Validator;
use App\Module;
use App\Upload;
use Illuminate\Support\Str;
use App\Mainframe\Helpers\FormView;

/**
 * Class ModuleBaseController
 */
class ModuleBaseController extends MainframeBaseController
{
    protected $moduleName;        // Stores module name with lowercase and plural i.e. 'superheros'.
    protected $module;            // Stores module name with lowercase and plural i.e. 'superheros'.
    protected $query;             // Stores default DB query to create the grid. Used in grid() function.
    protected $grid_columns;      // Columns to show, this array is set form modules individual controller.
    protected $reportDataSource;  // loads the model name

    /**
     * Constructor for this class is very important as it boots up necessary features of
     * Spyr module. First of all, it load module related meta information, then based
     * on context check(tenant context) it loads the tenant id. The it constructs the default
     * grid query and also add tenant context to grid query if applicable. Finally it
     * globally shares a couple of variables $moduleName, $currentModule to all views rendered
     * from this controller
     */
    public function __construct()
    {
        parent::__construct();

        $this->moduleName = controllerModule(get_class($this));
        $this->module     = Module::where('name', $this->moduleName)->remember(cacheTime('long'))->first();

        if ($tenantId = inTenantContext($this->moduleName)) {
            Request::merge([tenantIdField() => $tenantId]);
        }

        View::share([
            'moduleName'    => $this->moduleName,
            'currentModule' => $this->module
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
        if (hasModulePermission($this->moduleName, 'view-list')) {
            if (Request::get('ret') === 'json') {
                return $this->list();
            }
            $view = 'mainframe.layouts.module.grid.layout';
            if (View::exists('mainframe.modules.'.$this->moduleName.'.grid')) {
                $view = 'modules.'.$this->moduleName.'.grid';
            }

            return view($view)->with('grid_columns', $this->gridColumns());
        }
        abort(403);
    }
    
    /**
     * Shows an element create form.
     *
     * @return \Illuminate\Contracts\View\View|\View
     * @throws \Exception
     */
    public function create()
    {
        if (hasModulePermission($this->moduleName, 'create')) {

            $uuid = Request::old('uuid') ?: uuid();
            $view = FormView::resolve($this->moduleName, 'create', user());
            $formConfig = [
                'route' => $this->moduleName.'.store',
                'class' => $this->moduleName."-form module-base-form create-form",
                'name'  => $this->moduleName,
                'files' => true
            ];

            return View::make($view)
                ->with(compact('formConfig', 'uuid'))
                ->with('elementIsEditable', true)
                ->with('formState', 'create');
        }
        abort(403);
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

        $moduleName = $this->moduleName;
        $Model      = model($this->moduleName);
        $validator  = null;
        $element    = new $Model($this->transformInputs(Request::all()));

        if (hasModulePermission($this->moduleName, 'create')) {

            $validator = Validator::make(
                Request::all(),
                $Model::rules($element),
                $Model::$customValidationMessages
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
        $moduleName = $this->moduleName;
        $Model      = model($this->moduleName);
        //$elementName = str_singular($moduleName);
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
        return Redirect::route("$moduleName.edit", $id);
    }

    /**
     * Show spyr element edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        /** @var \App\Basemodule $Model */
        /** @var \App\Basemodule $element */
        // init local variables
        $moduleName  = $this->moduleName;
        $Model       = model($this->moduleName);
        $elementName = Str::singular($moduleName);
        # --------------------------------------------------------
        # Process return/redirect
        # --------------------------------------------------------
        if ($element = $Model::find($id)) { // Check if the element you are trying to edit exists

            if ($element->isViewable()) { // Check if the element is viewable
                $view = FormView::resolve($this->moduleName, 'edit', user());

                $formConfig = [
                    'route'  => [$moduleName.'.update', $element->id],
                    'class'  => $moduleName."-form module-base-form edit-form",
                    'name'   => $moduleName,
                    'files'  => true,
                    'method' => 'patch',
                    'id'     => $moduleName.'Form'
                ];

                return View::make($view)
                    ->with('element', $elementName)     //loads the singular module name in variable called $element = 'user'
                    ->with($elementName, $element)      //loads the object into a variable with module name $user = (user object)
                    ->with('formConfig', $formConfig)   //loads the object into a variable with module name $user = (user object)
                    ->with('formState', 'edit')
                    ->with('elementIsEditable', $element->isEditable());
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
        $Model = model($this->moduleName);
        $ret   = ret(); // load default return values
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
        // $moduleName = $this->moduleName;
        $Model = model($this->moduleName);
        // $elementName = str_singular($moduleName);
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
        abort(403);
    }
}
