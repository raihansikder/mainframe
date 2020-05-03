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

    /** @var string Module name */
    protected $moduleName;

    /** @var Module */
    protected $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    protected $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    protected $element;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelProcessor */
    protected $processor;

    /**
     * @param  null $name
     */
    public function __construct($name = null)
    {
        parent::__construct();

        //$this->name = $name ?? Module::fromController(get_class($this));
        $this->module = Module::byName($this->moduleName);

        $this->model = $this->module->modelInstance();

        View::share([
            'module' => $this->module,
            'model' => $this->model
        ]);
    }

    /**
     * Index/List page to show grid
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

        $vars = ['columns' => $this->datatable()->columns()];

        return $this->view($this->grid())->with($vars);
    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    /**
     * Show
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
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

        return $this->load($this->element)
            ->to(route($this->moduleName.'.edit', $id))->send();

    }

    /**
     * Shows an element create form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\View
     * @throws \Exception
     */
    public function create()
    {
        $this->element = $this->module->modelInstance();
        $uuid = request()->old('uuid') ?: uuid();
        $this->element->fill(request()->all());
        $this->element->uuid = $uuid;

        if (! user()->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $vars = [
            'uuid' => $uuid,
            'element' => $this->element,
            'formConfig' => $this->formConfig('create'),
            'editable' => true,
            'formState' => 'create',
        ];

        return $this->view($this->form('create'))->with($vars);
    }

    /**
     * Edit
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

        $vars = [
            'element' => $this->element,
            'formConfig' => $this->formConfig('edit'),
            'editable' => user()->can('update', $this->element),
            'formState' => 'edit',
            'immutables' => $this->element->processor()->getImmutables(),
        ];

        return $this->view($this->form('edit'))->with($vars);
    }

    /**
     * Store
     *
     * @param  \Illuminate\Http\Request $request
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

        $this->setRedirectTo();

        if ($this->expectsJson()) {
            return $this->load($this->element->toArray())->json();
        }

        return $this->redirect();
    }

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        if (! $this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        $this->attemptUpdate();

        $this->setRedirectTo();

        if ($this->expectsJson()) {
            return $this->load($this->element)->json();
        }

        return $this->redirect();
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

        $this->setRedirectTo();

        if ($this->expectsJson()) {
            return $this->load($this->element)->json();
        }

        return $this->redirect();
    }

    /**
     * Restore a soft-deleted.
     *
     * @param  null $id
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController
     */
    public function restore($id = null)
    {
        return abort(403, 'Restore restricted');
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function report()
    {
        if (! user()->can('viewAny', $this->model)) {
            return $this->permissionDenied();
        }

        return (new ModuleReportBuilder($this->module))->show();
    }

    /**
     * Resolve which MainframeDatatable class to use.
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
     * @param  null $id
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
     * @param  null $id
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController
     */
    public function storeUploads($id)
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

        return $this->view('mainframe.layouts.module.changes.index')
            ->with(['audits' => $audits]);

    }

    /**
     * Get all the comments of an element
     *
     * @param  null $id
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
     * @param  null $id
     * @return \App\Mainframe\Features\Modular\ModularController\ModularController
     */
    public function storeComments($id)
    {
        request()->merge([
            'module_id' => $this->module->id,
            'element_id' => $id,
        ]);

        return app(CommentController::class)->store(request());
    }
}
