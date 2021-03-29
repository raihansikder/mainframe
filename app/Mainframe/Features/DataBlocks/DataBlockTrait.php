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
     * Process the result
     */
    public function process()
    {
        $this->data = 'test';
    }

    /**
     * Get the final result
     *
     * @return mixed
     */
    public function data()
    {
        $this->process();

        return $this->data;
    }

}