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
use App\Mainframe\Helpers\FormView;
use App\Mainframe\Helpers\GridView;
use App\Mainframe\Helpers\ControllerResponseBuilder;
use App\Mainframe\Traits\ModuleBaseController\Listable;
use App\Mainframe\Traits\ModuleBaseController\Reportable;
use App\Mainframe\Traits\ModuleBaseController\ChangeLogs;
use App\Mainframe\Traits\ModuleBaseController\GridDatatable;
use App\Mainframe\Traits\ModuleBaseController\Transformable;
use App\Mainframe\Traits\ModuleBaseController\ResponseGenerator;

/**
 * Class ModuleBaseController
 */
class ModuleBaseController extends MainframeBaseController
{
    use Listable, ChangeLogs, Reportable, Transformable, GridDatatable, ResponseGenerator;

    /** @var string */
    public $moduleName;        // Stores module name with lowercase and plural i.e. 'superheros'.

    /** @var Module */
    public $module;            // Stores module name with lowercase and plural i.e. 'superheros'.

    /** @var \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder */
    public $query;             // Stores default DB query to create the grid. Used in grid() function. // todo: don't know the usage

    /** @var \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder */
    public $reportDataSource;  // loads the model name

    /** @var \Eloquent */
    public $element;

    /** @var \App\Mainframe\Features\Validator\MainframeModelValidator */
    public $validator;  // loads the model name

    /** @var \App\Mainframe\Features\Datatable\MainframeDatatable */
    public $datatable;

    /** @var \Illuminate\Database\Eloquent\Builder */
    public $model;

    /** @var \Illuminate\Http\Request */
    public $request;

    /** @var string */
    public $responseStatus;

    /** @var mixed */
    public $responsePayload;

    /** @var \App\Mainframe\Helpers\ControllerResponseBuilder|self */
    public $responder;

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

        $this->moduleName = Module::fromController(get_class($this));
        $this->module     = Module::byName($this->moduleName);
        $this->model      = $this->module->modelInstance();
        $this->datatable  = $this->resolveDatatableClass();
        $this->request    = Request::capture();

        $this->responder  = new ControllerResponseBuilder($this);


        View::share([
            'moduleName'    => $this->moduleName,
            'currentModule' => $this->module,
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
            $view = GridView::resolve($this->moduleName);

            return view($view)->with('gridColumns', $this->datatable->columns());
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
            $view = FormView::resolve($this->moduleName, 'create');

            $formConfig = [
                'route' => $this->moduleName.'.store',
                'class' => $this->moduleName."-form module-base-form create-form",
                'name'  => $this->moduleName,
                'files' => true
            ];

            $elementIsEditable = true;
            $formState         = 'create';

            return View::make($view)
                ->with(compact('formConfig', 'uuid', 'elementIsEditable', 'formState'));
        }
        abort(403);
    }

    /**
     * Store an spyr element. Returns json response if ret=json is sent as url parameter. Otherwise redirects
     * based on the url set in redirect_success|redirect_fail
     *
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @var \App\Mainframe\Basemodule $element
     * @var \App\Superhero $Model
     */
    public function store()
    {

        $moduleName = $this->moduleName;
        $Model      = model($this->moduleName);
        $validator  = null;
        $element    = new $Model($this->transform(Request::all()));

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



        $this->element = $this->model->find($id);

        if (! $this->element) {
            return $this->elementNotFound();
        }

        if (! $this->element->isViewable()) {
            return $this->permissionDenied();
        }

        return $this->elementFound();

    }

    /**
     * Show spyr element edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $elementName = $this->module->elementName();
        $element     = $this->model->find($id);

        if ($element) { // Check if the element you are trying to edit exists

            if ($element->isViewable()) { // Check if the element is viewable
                $view = FormView::resolve($this->moduleName, 'edit', user());

                $formConfig = [
                    'route'  => [$this->moduleName.'.update', $element->id],
                    'class'  => $this->moduleName.'-form module-base-form edit-form',
                    'name'   => $this->moduleName,
                    'files'  => true,
                    'method' => 'patch',
                    'id'     => $this->moduleName.'Form'
                ];

                $elementIsEditable = $element->isEditable();
                $formState         = 'edit';

                return View::make($view)
                    ->with('element', $elementName)     //loads the singular module name in variable called $element = 'user'
                    ->with($elementName, $element)      //loads the object into a variable with module name $user = (user object)
                    ->with(compact('formConfig', 'formState', 'elementIsEditable'));
            }
        }

        return abort(403);
    }

    /**
     * Update handler for spyr element.
     *
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @var \App\Mainframe\Basemodule $element
     * @var \App\Mainframe\Basemodule $Model
     */
    public function updateOld($id)
    {

        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \App\Mainframe\Basemodule $element */
        // init local variables
        $Model = model($this->moduleName);
        $ret   = ret(); // load default return values
        # --------------------------------------------------------
        # Process update
        # --------------------------------------------------------
        $validator = null;
        if ($element = $Model::find($id)) { // Check if element exists.
            if (user()->can('update', $element)) { // Check if the element is editable.

                $element->fill($this->transform(Request::all()));
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
     * Update handler for spyr element.
     *
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @var \App\Mainframe\Basemodule $element
     * @var \App\Mainframe\Basemodule $Model
     */
    public function update($id)
    {

        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \App\Mainframe\Basemodule $element */
        // init local variables
        $Model = model($this->moduleName);
        $ret   = ret(); // load default return values
        # --------------------------------------------------------
        # Process update
        # --------------------------------------------------------
        $element = $this->element;

        if (! $element) {
            $ret = ret('fail', "{$this->module->title} could not be found.");
        }

        if ($element = $Model::find($id)) { // Check if element exists.
            if (user()->can('update', $element)) { // Check if the element is editable.

                $element->fill($this->transform(Request::all()));
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
        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \App\Mainframe\Basemodule $element */
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
