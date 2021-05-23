<?php

namespace App\Mainframe\Features\DataBlocks;

use App\Mainframe\Http\Controllers\DataBlockController;

/** @mixin DataBlockController $this */
trait DataBlockControllerTrait
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

        $payload = (new $class)->data();

        return $this->load($payload)->json();

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
            $path = '\App\Projects\\'.project().'\DataBlocks\\'.$class;
            if (class_exists($path)) {
                return $path;
            }

        }

        // Default Mainframe location
        return '\App\Mainframe\DataBlocks\\'.$class;
    }

}