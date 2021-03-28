<?php

namespace App\Projects\MyProject\Features\DataBlocks;

use App\Mainframe\Features\DataBlocks\DataBlock;
use App\User;

class TotalUsers extends DataBlock
{
    public function process()
    {
        $this->data = [
            'total' => User::count(),
            'total_active' => 11,
        ];
    }

}