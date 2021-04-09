<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportBuilder;
use Str;

trait ReportControllerTrait
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

        /** @var ReportBuilder $report */
        $report = new $class;

        if($this->permissionKeyExists($name)){
            if(!$this->user->can($name)){
                return $this->permissionDenied();
            }
        }

        return $report->output();

    }

    public function resolveClass($name)
    {
        return $this->dir.Str::ucfirst(Str::camel($name));
    }

    public function permissionKeyExists($name)
    {
        return config('mainframe.permissions.custom.reports.'.$name);
    }

}