<?php

namespace App\Projects\MyProject\Features\DataBlocks;

use App\User;

class TotalUsers extends DataBlock
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
        // Load the data
        $this->data = [
            'total' => User::count(),
            'total_active' => User::where('is_active', 1)->count(),
        ];
    }

    // Additional helper for data calculation

}