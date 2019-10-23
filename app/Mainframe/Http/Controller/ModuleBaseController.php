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
use App\Mainframe\Helpers\GridView;
use App\Mainframe\Traits\ModuleBaseController\ListTrait;
use App\Mainframe\Traits\ModuleBaseController\Resolvable;
use App\Mainframe\Traits\ModuleBaseController\DatatableTrait;
use App\Mainframe\Traits\ModuleBaseController\ViewReportTrait;
use App\Mainframe\Traits\ModuleBaseController\ShowChangesTrait;
use App\Mainframe\Traits\ModuleBaseController\ModelOperationsTrait;

/**
 * Class ModuleBaseController
 */
class ModuleBaseController extends MainframeBaseController
{
    use ModelOperationsTrait, ListTrait, ShowChangesTrait, ViewReportTrait, DatatableTrait, Resolvable;

    /** @var string */
    protected $moduleName;

    /** @var Module */
    protected $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    protected $model;

    /** @var \App\Mainframe\Traits\BaseModule\ */
    protected $element;

    /** @var \App\Mainframe\Features\Validator\ModelValidator */
    protected $modelValidator;

    /**
     * @param  null  $moduleName
     */
    public function __construct($moduleName = null)
    {
        parent::__construct();

        $this->moduleName = $moduleName ?? Module::fromController(get_class($this));
        $this->module = Module::byName($this->moduleName);
        $this->model = $this->module->modelInstance();

        View::share([
            'module' => $this->module,
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

        if (! $this->can('view-list')) {
            return $this->permissionDenied();
        }

        if ($this->expectsJson()) {
            return $this->success()->payload($this->listData())->json();
        }

        $view = GridView::resolve($this->moduleName);
        $datatable = $this->resolveDatatableClass();

        return view($view)->with('gridColumns', $datatable->columns());

    }

    /**
     * Shows an element create form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\View|void
     * @throws \Exception
     */
    public function create()
    {
        $this->element = $this->module->modelInstance();

        if (! user()->cannot('create')) {
            return $this->permissionDenied();
        }

        $uuid = $this->request->old('uuid') ?: uuid();
        $formState = 'create';
        $formConfig = $this->createFromConfig();
        $elementIsEditable = true;

        return View::make($this->createFormView())
            ->with('element', $this->element)
            ->with(compact('formConfig', 'uuid', 'elementIsEditable', 'formState'));
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

        if (! user()->cannot('create')) {
            return $this->permissionDenied();
        }

        /******************/
        $moduleName = $this->moduleName;
        $Model = model($this->moduleName);
        $validator = null;
        $element = new $Model($this->transform(Request::all()));

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
            return $this->notFound();
        }

        if (! $this->element->isViewable()) {
            return $this->permissionDenied();
        }

        if ($this->expectsJson()) {
            return $this->success()->payload($this->element)->json();
        }

        return Redirect::route("$this->moduleName.edit", $id);

    }

    /**
     * Show spyr element edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|void
     */
    public function edit($id)
    {

        $this->element = $this->model->find($id);

        if (! $this->element) {
            return $this->notFound();
        }

        if (! $this->element->isViewable()) {
            return $this->permissionDenied();
        }

        $formState = 'edit';
        $formConfig = $this->editFromConfig();
        $elementIsEditable = $this->element->isEditable();

        return View::make($this->editFormView())
            ->with('element', $this->element)     //loads the singular module name in variable called $element = 'user'
            ->with(compact('formConfig', 'formState', 'elementIsEditable'));

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
        $this->element = $this->model->find($id);

        if (! $this->element) {
            return $this->notFound();
        }

        if (user()->cannot('update', $this->element)) {
            return $this->permissionDenied();
        }

        $this->attemptUpdate();

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();
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
        return abort(403);
    }

}
