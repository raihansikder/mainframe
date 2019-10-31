<?php /** @noinspection PhpUnusedParameterInspection */
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseController;

use View;
use Redirect;
use Illuminate\Http\Request;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Helpers\Modular\Resolvers\GridView;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ListTrait;
use App\Mainframe\Helpers\Modular\BaseController\Traits\Resolvable;
use App\Mainframe\Helpers\Modular\BaseController\Traits\DatatableTrait;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ViewReportTrait;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ShowChangesTrait;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ModelOperationsTrait;

/**
 * Class ModuleBaseController
 */
class ModuleBaseController extends MainframeBaseController
{
    use ModelOperationsTrait, ListTrait, ShowChangesTrait,
        ViewReportTrait, DatatableTrait, Resolvable;

    /** @var string */
    public $moduleName;

    /** @var Module */
    protected $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    protected $model;

    /** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule */
    protected $element;

    /** @var \App\Mainframe\Helpers\Modular\Validator\ModelValidator */
    protected $validator;

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
        if (! user()->can('viewAny', $this->model)) {
            return $this->permissionDenied();
        }

        if ($this->expectsJson()) {
            return $this->success()->payload($this->listData())->json();
        }

        return view(GridView::resolve($this->moduleName))
            ->with('gridColumns', $this->resolveDatatableClass()->columns());
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

        if (! user()->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $uuid = $this->request->old('uuid') ?: uuid();
        $formState = 'create';
        $formConfig = $this->createFromConfig();
        $elementIsEditable = true;

        return View::make($this->createFormView())
            ->with('element', $this->element)
            ->with(compact('formConfig', 'uuid',
                'elementIsEditable', 'formState'));
    }

    /**
     * Store an spyr element. Returns json response if ret=json is sent as url parameter. Otherwise redirects
     * based on the url set in redirect_success|redirect_fail
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! user()->cannot('create')) {
            return $this->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        $this->attemptStore();

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();
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
        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (! user()->can('view', $this->element)) {
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
        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->permissionDenied();
        }

        $formState = 'edit';
        $formConfig = $this->editFromConfig();
        $elementIsEditable = user()->can('update', $this->element);

        return View::make($this->editFormView())
            ->with('element', $this->element)
            ->with(compact('formConfig', 'formState', 'elementIsEditable'));
    }

    /**
     * Update handler for spyr element.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (user()->cannot('update', $this->element)) {
            return $this->permissionDenied();
        }

        $this->attemptUpdate();

        if ($this->expectsJson()) {
            return $this->payload($this->element)->json();
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
        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (user()->cannot('delete', $this->element)) {
            return $this->permissionDenied();
        }

        $this->attemptDestroy();

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();
    }

    /**
     * Restore a soft-deleted.
     *
     * @param  null  $id
     * @return $this
     */
    public function restore($id = null)
    {
        return abort(403, $id.'- Restore restricted');
    }

}
