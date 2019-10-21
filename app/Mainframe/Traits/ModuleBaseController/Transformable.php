<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait Transformable
{
    /**
     * Transforms inputs to a Model compatible format.
     *
     * @param  array  $inputs
     * @return array
     */
    public function transform($inputs = [])
    {
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

        return $inputs;
    }
}