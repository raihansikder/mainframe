<?php


namespace App\Mainframe\Features\DataBlocks;

use App\Mainframe\Http\Controllers\DataBlockController;
use Str;

/** @mixin DataBlockController $this */
trait DataBlockControllerTrait
{

    /**
     * Show the application dashboard.
     *
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($name)
    {
        $class = $this->resolveClass($name);
        if (!class_exists($class)) {
            return $this->fail("Class {$class} not found")->json();
        }

        $payload = (new $class)->data();
        return $this->load($payload)->json();

    }

    public function resolveClass($name)
    {
        return  $this->dir.Str::ucfirst(Str::camel($name));
    }



}