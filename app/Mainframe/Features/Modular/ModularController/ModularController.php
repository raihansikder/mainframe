<?php

/** @noinspection PhpUnusedParameterInspection */

namespace App\Mainframe\Features\Modular\ModularController;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Features\Modular\ModularController\Traits\ModelProcessorHelper;
use App\Mainframe\Features\Modular\ModularController\Traits\RequestValidator;
use App\Mainframe\Features\Modular\ModularController\Traits\Resolvable;
use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Features\Report\ModuleReportBuilder;
use App\Mainframe\Http\Controllers\BaseController;
use App\Mainframe\Modules\Comments\CommentController;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Uploads\UploadController;
use Illuminate\Http\Request;
use View;

/**
 * Class ModuleBaseController
 */
class ModularController extends BaseController
{
    use RequestValidator, ModelProcessorHelper, Resolvable;

    /**
     * Module name
     *
     * @var string
     */
    protected $moduleName;

    /**
     * @var Module
     */
    protected $module;

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    protected $element;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelProcessor */
    protected $processor;

    /**
     * ModularController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('tenant');
        // Load
        $this->module = Module::byName($this->moduleName);
        $this->model = $this->module->modelInstance();
        $this->view = $this->viewProcessor()->setModule($this->module)->setModel($this->model);

        // Share these variables in  all views
        View::share([
            'module' => $this->module,
            'model' => $this->model,
            'view' => $this->view,
        ]);
    }

    /**
     * Index/List
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (! user()->can('view-any', $this->model)) {
            return $this->permissionDenied();
        }

        if ($this->expectsJson()) {
            return $this->listJson();
        }

        // Pass data table columns ot view
        $vars = ['columns' => $this->datatable()->columns()];
        $this->view->setType('index')->addVars($vars);

        return $this->view($this->view->gridPath())
            ->with($this->view->getVars());
    }

    /**
     * Show
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @urlParam  id required The ID of the item.
     */
    public function show($id)
    {
        $relations = request('with') ? explode(',', request('with')) : [];

        if (! $this->element = $this->model->with($relations)->find($id)) {
            return $this->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->permissionDenied();
        }

        // Redirect to edit page.
        return $this->load($this->element)->to(route($this->moduleName.'.edit', $id))->send();

    }

    /**
     * Show create form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\View
     * @throws \Exception
     */
    public function create()
    {
        $uuid = request()->old('uuid') ?: uuid();
        $this->element = $this->model->fill(request()->all());
        $this->element->uuid = $uuid;

        if (! user()->can('create', $this->element)) {
            return $this->permissionDenied();
        }

        // Set view processor attributes
        $this->view->setType('create')->setElement($this->element);

        return $this->view($this->view->formPath('create'))
            ->with($this->view->varsCreate());
    }

    /**
     * Edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->permissionDenied();
        }

        // Set view processor attributes
        $this->view->setType('edit')
            ->setElement($this->element)
            ->setImmutable($this->element->processor()->getImmutables());

        return $this->view($this->view->formPath('edit'))
            ->with($this->view->viewVarsEdit());
    }

    /**
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! user()->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        $this->attemptStore();
        // try {
        //     $this->attemptStore();
        // } catch (\Exception $e) {
        //     $this->response()->validator->errors()->add('Error', $e->getMessage());
        // }

        return $this->load($this->element->toArray())->send();
    }

    /**
     * Update
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

        $this->attemptUpdate();

        return $this->load($this->element)->send();
    }

    /**
     * Delete
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

        return $this->load($this->element)->send();
    }

    /**
     * Restore a soft-deleted item
     *
     * @param  null  $id
     * @return void
     */
    public function restore($id = null)
    {
        return abort(403, 'Restore restricted');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function report()
    {
        if (! user()->can('view-report', $this->model)) {
            return $this->permissionDenied();
        }

        return (new ModuleReportBuilder($this->module))->output();
    }

    /**
     * Resolve which Datatable class to use.
     *
     * @return \App\Mainframe\Features\Datatable\Datatable
     */
    public function datatable()
    {
        return new ModuleDatatable($this->module);
    }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    public function datatableJson()
    {
        return ($this->datatable())->json();
    }

    /**
     * Get all the uploads of an element
     *
     * @param  null  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploads($id)
    {
        request()->merge([
            'module_id' => $this->module->id,
            'element_id' => $id,
        ]);

        return app(UploadController::class)->listJson();
    }

    /**
     * Uploads files under an element
     *
     * @param  null  $id
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController
     */
    public function attachUpload($id)
    {
        request()->merge([
            'module_id' => $this->module->id,
            'element_id' => $id,
        ]);

        return app(UploadController::class)->store(request());
    }

    /**
     * Show all the changes/change logs of an item
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     */
    public function changes($id)
    {

        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->permissionDenied();
        }

        $audits = $this->element->audits;
        // return $audits;

        if ($this->expectsJson()) {
            return $this->success()->load($audits)->json();
        }

        return $this->view($this->view->changesPath())
            ->with(['audits' => $audits]);

    }

    /**
     * Get all the comments of an element
     *
     * @param  null  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function comments($id)
    {
        request()->merge([
            'module_id' => $this->module->id,
            'element_id' => $id,
        ]);

        return app(CommentController::class)->listJson();
    }

    /**
     * Store comment files under an element
     *
     * @param  null  $id
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController
     */
    public function attachComment($id)
    {
        request()->merge([
            'module_id' => $this->module->id,
            'element_id' => $id,
        ]);

        return app(CommentController::class)->store(request());
    }
}
