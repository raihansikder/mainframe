<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportBuilder;

trait ReportControllerTrait
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

        /** @var ReportBuilder $report */
        $report = new $class;

        if ($this->permissionKeyExists($key)) {
            if (!$this->user->can($key)) {
                return $this->permissionDenied();
            }
        }

        return $report->output();

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
            $path = '\App\Projects\\'.project().'\Reports\\'.$class;
            if (class_exists($path)) {
                return $path;
            }

        }

        // Default Mainframe location
        return '\App\Mainframe\Reports\\'.$class;
    }

    /**
     * Check permission
     *
     * @param $key
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function permissionKeyExists($key)
    {
        return config('mainframe.permissions.custom.reports.'.$key);
    }

}