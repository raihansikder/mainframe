<?php

namespace App\Mainframe\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mainframe\Features\Core\Traits\SendResponse;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Core\ViewProcessor;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use View;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{
    use Validable, SendResponse;

    /** @var \App\User|null */
    protected $user;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor */
    protected $view;

    /**
     * @var Model
     */
    protected $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    protected $element;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelProcessor */
    protected $processor;

    /** @var \App\Tenant */
    protected $tenant;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->user = user();
        $this->view = new ViewProcessor();
        $this->tenant = $this->user->tenant; // For multi-tenancy

        View::share([
            'user' => $this->user,
            'view' => $this->view,
            'tenant' => $this->tenant,
        ]);
    }

    /**
     * @param  \App\User|null  $user
     * @return BaseController
     */
    public function setUser(?\App\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param  ViewProcessor  $view
     * @return BaseController
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @param  BaseModule  $element
     * @return Validable
     */
    public function processAndSave($element)
    {
        $processor = $element->process()->save();
        if ($processor->isInvalid()) {
            $this->mergeValidatorErrors($processor->validator);
        }

        return $this;

    }

    /**
     * @param  BaseModule  $element
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|mixed
     */
    public function process($element = null)
    {
        if (!$element && isset($this->element)) {
            $element = $this->element;
        }

        $this->processor = $element->processor();

        return $this;
    }

    /**
     * @param  null  $element
     * @return BaseModule|bool
     */
    public function save($element = null)
    {

        $this->process($element);

        if (!$this->processor) {
            return false;
        }

        $this->processor->save();

        if ($this->processor->isInvalid()) {
            $this->mergeValidatorErrors($this->processor->validator);

            return false;
        }

        return $this->processor->element;
    }

    /**
     * @param  null  $element
     * @return BaseModule|bool
     * @throws \Exception
     */
    public function delete($element = null)
    {

        $this->process($element);

        if (!$this->processor) {
            return false;
        }

        $this->processor->delete();
        if ($this->processor->isInvalid()) {
            $this->mergeValidatorErrors($this->processor->validator);

            return false;
        }

        return $this->processor->element;
    }

    /**
     * Clear out existing messages.
     *
     * @return $this
     */
    public function resetMessageBag()
    {
        $this->messageBag = new MessageBag();
        $this->response()->messageBag = $this->messageBag;

        return $this;
    }
}