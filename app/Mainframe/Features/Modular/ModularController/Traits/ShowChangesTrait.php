<?php

namespace App\Mainframe\Features\Modular\ModularController\Traits;

/** @mixin  \App\Mainframe\Features\Modular\ModularController\ModularController */
trait ShowChangesTrait
{
    /**
     * Show all the changes/change logs of an item
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     */
    public function changes($id)
    {

        if (! $this->element = $this->model->find($id)) {
            return $this->response()->notFound();
        }

        if (! user()->can('view', $this->element)) {
            return $this->response()->permissionDenied();
        }

        $audits = $this->element->audits;
        // return $audits;

        if ($this->response()->expectsJson()) {
            return $this->response()->success()->load($audits)->json();
        }

        return $this->response()->view('mainframe.layouts.module.changes.index')
            ->with(['audits' => $audits]);

    }
}