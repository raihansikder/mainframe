<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Features\Report\ModuleReportBuilder;
use App\Mainframe\Modules\Comments\CommentController;
use App\Mainframe\Modules\Uploads\UploadController;
use Illuminate\Http\Request;

/** @mixin ModularController */
trait ModularControllerTrait
{
    /**
     * Index/List
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (!$this->user->can('view-any', $this->model)) {
            return $this->permissionDenied();
        }

        if ($this->expectsJson()) {
            return $this->listJson();
        }

        $this->view->setType('index')->setDatatable($this->datatable());
        $this->view->addVars(['columns' => $this->datatable()->columns()]);

        return $this->view($this->view->gridPath());
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

        if (!$this->element = $this->model->with($relations)->find($id)) {
            return $this->notFound();
        }

        if (!$this->user->can('view', $this->element)) {
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

        if (!$this->user->can('create', $this->element)) {
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
        if (!$this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (!$this->user->can('view', $this->element)) {
            return $this->permissionDenied();
        }

        // Set view processor attributes
        $this->view->setType('edit')
            ->setElement($this->element)
            ->addImmutables($this->element->processor()->getImmutables());

        return $this->view($this->view->formPath('edit'))
            ->with($this->view->viewVarsEdit());
    }

    /**
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @noinspection PhpUnusedParameterInspection
     */
    public function store(Request $request)
    {
        if (!$this->user->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        try {
            $this->attemptStore();
        } catch (\Exception $e) {
            $this->error($e->getFile().'. Line'.$e->getLine(). " - " .$e->getMessage());
        }

        return $this->load($this->element)->send();
    }

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @noinspection PhpUnusedParameterInspection
     */
    public function update(Request $request, $id)
    {

        if (!$this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if ($this->user->cannot('update', $this->element)) {
            return $this->permissionDenied();
        }

        try {
            $this->attemptUpdate();
        } catch (\Exception $e) {
            $this->error($e->getFile().'. Line#'.$e->getLine(). " - " .$e->getMessage());
        }

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
        if (!$this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if ($this->user->cannot('delete', $this->element)) {
            return $this->permissionDenied();
        }

        try {
            $this->attemptDestroy();
        } catch (\Exception $e) {
            $this->error($e->getFile().'. Line'.$e->getLine(). " - " .$e->getMessage());
        }

        return $this->load($this->element)->send();
    }

    /**
     * Restore a soft-deleted item
     *
     * @param  null  $id
     * @return void
     * @noinspection PhpUnusedParameterInspection
     */
    public function restore($id = null)
    {
        return abort(403, 'Restore restricted');
    }

    /**
     * Clone an element
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function clone($id)
    {
        if (!$this->user->can('create', $this->model)) {
            return $this->permissionDenied();
        }

        $this->element = $this->model->find($id)->replicate();
        $this->element->uuid = uuid();
        $this->attemptStore();

        if (!$this->isValid()) {
            $this->redirectTo = route($this->moduleName.'.create');
            request()->merge($this->element->toArray());
        }

        return $this->load($this->element)->send();
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
        if (!$this->user->can('view-report', $this->model)) {
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

        if (!$this->element = $this->model->find($id)) {
            return $this->notFound();
        }

        if (!$this->user->can('view', $this->element)) {
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

    /**
     * Get all middlewares
     *
     * @return array
     */
    public function getAllMiddleWares()
    {
        $routeMiddlewares = request()->route()->middleware();
        $controllerMiddlewares = \Arr::pluck($this->getMiddleware(), 'middleware');

        return array_merge($routeMiddlewares, $controllerMiddlewares);
    }

    /**
     * Check if the call is a API call
     *
     * @return bool
     */
    public function isApiCall()
    {
        return in_array('api', $this->getAllMiddleWares());
    }
}