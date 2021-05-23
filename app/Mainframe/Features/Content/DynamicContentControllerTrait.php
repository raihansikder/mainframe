<?php

namespace App\Mainframe\Features\Content;

/**
 * Todo : Unused
 * Trait DynamicContentControllerTrait
 *
 * @package App\Mainframe\Features\DynamicContents
 */
trait DynamicContentControllerTrait
{

    /**
     * Cache Time in seconds
     *
     * @var int
     */
    public $cache; // Default -1 second

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

        return (new $class)->source();

    }

    public function resolveClass($name)
    {
        return $this->dir.\Str::ucfirst(\Str::camel($name));
    }

}