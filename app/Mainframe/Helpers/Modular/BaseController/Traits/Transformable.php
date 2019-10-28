<?php

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

trait Transformable
{
    /**
     * Transforms inputs to a Model compatible format.
     *
     * @return array
     */
    public function transform()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        return $this->request->all();
        //$this->request->merge(['name'=>'test']) ;

        /*
         * Convert an array input to csv
         ************************************************/
        // $arr_to_csv_inputs = [
        //     'array_input_field_name'
        // ];
        //
        // foreach ($arr_to_csv_inputs as $i){
        //     if(isset($inputs[$i]) && is_array($inputs[$i])){
        //         $inputs[$i] = arrayToCsv($inputs[$i]);
        //     }else{
        //         $inputs[$i] = null;
        //     }
        // }

        /*
         * Convert an array input to json
         ************************************************/
        // $arr_to_json_inputs = [
        //     'array_input_field_name'
        // ];
        //
        // foreach ($arr_to_json_inputs as $i){
        //
        //     if(isset($inputs[$i]) && is_array($inputs[$i])){
        //         $inputs[$i] = json_encode($inputs[$i]);
        //     }else{
        //         $inputs[$i] = null;
        //     }
        // }

    }
}