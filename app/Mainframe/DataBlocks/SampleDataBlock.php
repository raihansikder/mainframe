<?php

namespace App\Mainframe\DataBlocks;

use App\Mainframe\Features\DataBlocks\DataBlock;

class SampleDataBlock extends DataBlock
{
    /**
     * Load the result
     *
     * @var mixed
     */
    public $data;

    /**
     * Cache Seconds
     *
     * @var int
     */
    public $cache = 1;

    /**
     * Process the result
     */
    public function process()
    {
        // Todo: Prepare and load data
        $this->data = [
            'user' => [
                'orders' => 8,
                'quotes' => 7,
                'invoices' => 5,
            ],
        ];
    }

    // Write Additional helper for data calculation if needed.
}