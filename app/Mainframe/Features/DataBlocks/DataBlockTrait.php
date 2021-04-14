<?php

namespace App\Mainframe\Features\DataBlocks;

trait DataBlockTrait
{

    /**
     * Load the result
     *
     * @var mixed
     */
    public $data;

    /**
     * Cache Time in seconds
     *
     * @var int
     */
    public $cache = -1; // Default -1 second

    /**
     * Process the result
     */
    public function process()
    {
        $this->data = 'Put your value';
    }

    /**
     * Get the final result
     *
     * @return mixed
     */
    public function data()
    {
        return \Cache::remember(get_class($this), $this->cache, function () {
            $this->process();

            return $this->data;
        });

    }

}