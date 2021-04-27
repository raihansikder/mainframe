<?php

namespace App\Mainframe\Features\Datatable\Traits;

use App\Mainframe\Features\Datatable\Datatable;
use App\Mainframe\Http\Controllers\DatatableController;

/** @mixin DatatableController */
trait DatatableControllerTrait
{
    /**
     * Show the application dashboard.
     *
     * @param  string  $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($name)
    {
        $class = $this->resolveClass($name);
        if (!class_exists($class)) {
            return $this->fail("Class {$class} not found")->json();
        }

        /** @var Datatable $datatable */
        $datatable = new $class;
        $datatable->setAjaxUrl(route('datatable.json', $name));

        return $datatable->json();
    }

    public function resolveClass($name)
    {
        return rtrim($this->dir, "\\")."\\".classFromKey($name);
    }
}