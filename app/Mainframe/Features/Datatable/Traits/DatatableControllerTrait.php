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
     * @param  string  $key
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($key)
    {
        $class = $this->resolveClass($key);
        if (!class_exists($class)) {
            return $this->fail("Class {$class} not found")->json();
        }

        /** @var Datatable $datatable */
        $datatable = new $class;
        $datatable->setAjaxUrl(route('datatable.json', $key));

        return $datatable->json();
    }

    /**
     * Resolve class to execute the request
     *
     * @param $key
     * @return string
     */
    public function resolveClass($key)
    {
        $class = classFromKey($key);

        // $path defined in controller
        if (isset($this->path)) {
            $path = rtrim($this->path, "\\")."\\".$class;
            if (class_exists($path)) {
                return $path;
            }
        }

        // A project is setup
        if (project()) {
            $path = '\App\Projects\\'.project().'\Datatables\\'.$class;
            if (class_exists($path)) {
                return $path;
            }

        }

        // Default Mainframe location
        return '\App\Mainframe\Datatables\\'.$class;
    }
}