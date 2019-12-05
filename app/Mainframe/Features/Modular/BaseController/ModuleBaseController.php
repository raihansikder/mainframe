<?php /** @noinspection PhpUnusedParameterInspection */

namespace App\Mainframe\Features\Modular\BaseController;

use URL;
use View;
use Illuminate\Http\Request;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Features\Modular\Resolvers\GridView;
use App\Mainframe\Features\Report\ModuleReportBuilder;
use App\Mainframe\Features\Modular\BaseController\Traits\Resolvable;
use App\Mainframe\Features\Modular\BaseController\Traits\ModelOperations;
use App\Mainframe\Features\Modular\BaseController\Traits\ShowChangesTrait;


/**
 * Class ModuleBaseController
 */
class ModuleBaseController extends BaseController
{
    use ModelOperations, ShowChangesTrait, Resolvable;

    /** @var string Module name */
    public $name;

    /** @var Module */
    public $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    public $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    public $element;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelProcessor */
    public $processor;

    /**
     * @param  null  $name
     */
    public function __construct($name = null)
    {
        parent::__construct();

        $this->name = $name ?? Module::fromController(get_class($this));

        $this->module = Module::byName($this->name);
        $this->model = $this->module->modelInstance();
        View::share(['module' => $this->module]);
    }

    /**
     * Index/List page to show grid
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     */
    public function index()
    {
        if (! user()->can('viewAny', $this->model)) {
            return $this->response()->permissionDenied();
        }

        if ($this->response()->expectsJson()) {
            return $this->list();
        }

        $vars = ['columns' => $this->datatable()->columns()];

        return $this->response()->view( GridView::resolve($this->name))->with($vars);
    }



    /**
     * Show
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        if (! $this->element = $this->model->find($id)) {
            return $this->response()->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->response()->permissionDenied();
        }

        if ($this->response()->expectsJson()) {
            return $this->response()->success()->load($this->element)->json();
        }

        return $this->response()->redirect(route($this->name.".edit", $id));


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
            return $this->response()->permissionDenied();
        }

        $vars = [
            'element' => $this->element,
            'formConfig' => $this->formConfig('create'),
            'uuid' => request()->old('uuid') ?: uuid(),
            'editable' => true,
            'formState' => 'create',
        ];

        return $this->response()->view($this->createFormView())->with($vars);
    }



    /**
     * Edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|void
     */
    public function edit($id)
    {
        if (! $this->element = $this->model->find($id)) {
            return $this->response()->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->response()->permissionDenied();
        }

        $vars = [
            'element' => $this->element,
            'formConfig' => $this->formConfig('edit'),
            'editable' => user()->can('update', $this->element),
            'formState' => 'edit',
        ];
        return $this->response()->view($this->editFormView())->with($vars);
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
            return $this->response()->permissionDenied();
        }

        $this->element = $this->model; // Create an empty model to be stored.

        $this->attemptStore();

        $this->response()->redirectTo = $this->redirectTo();

        if ($this->response()->expectsJson()) {
            return $this->response()->load($this->element)->json();
        }
        return $this->response()->redirect();
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
            return $this->response()->notFound();
        }

        if (! user()->can('update', $this->element)) {
            return $this->response()->permissionDenied();
        }

        $this->attemptUpdate();

        $this->response()->redirectTo = $this->redirectTo();

        if ($this->response()->expectsJson()) {
            return $this->response()->load($this->element)->json();
        }

        
        
        return $this->response()->redirect();
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
            return $this->response()->notFound();
        }

        if (user()->cannot('delete', $this->element)) {
            return $this->response()->permissionDenied();
        }

        $this->attemptDestroy();

        if ($this->response()->expectsJson()) {
            return $this->response()->json();
        }
        return $this->response()->redirect();
    }

    /**
     * Restore a soft-deleted.
     *
     * @param  null  $id
     * @return \App\Mainframe\Features\Modular\BaseController\ModuleBaseController|void
     */
    public function restore($id = null)
    {
        return abort(403, 'Restore restricted');
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed|void
     */
    public function report()
    {

        if (! user()->can('viewAny', $this->model)) {
            return $this->response()->permissionDenied();
        }

        return (new ModuleReportBuilder($this->module))->show();

    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        return (new ModuleList($this->module))->json();
    }

    /**
     * Try to figure out where to redirect
     *
     * @return array|\Illuminate\Http\Request|string
     */
    public function redirectTo()
    {
        if ($this->response()->isSuccess() && request('redirect_success')) {
            if ($this->element && request('redirect_success') == '#new') {
                return route($this->module->name.".edit", $this->element->id);
            }

            return request('redirect_success');
        }

        if ($this->response()->isFail() && request('redirect_fail')) {
            return request('redirect_fail');
        }

        return URL::full();
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
}
