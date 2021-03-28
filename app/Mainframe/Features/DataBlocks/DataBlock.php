<?php


namespace App\Mainframe\Features\DataBlocks;



class DataBlock
{
    public $data;

    public function __construct() {

    }

    public function process()
    {
        $this->data = 'test';
    }

    public function data(){

        $this->process();
        return $this->data;
    }

}