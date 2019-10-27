<?php

namespace App\Http\Mainframe\Helpers\Modular\BaseController;

use Request;
use Response;

trait ListTrait
{

    /**
     * Returns a collection of objects as Json
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Illuminate\Database\Eloquent\Builder $q
     * @var \App\Mainframe\Basemodule $Model
     */
    public function list()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $ret = ret('success', "{$this->moduleName} list", $this->listData());

        return Response::json(fillRet($ret));
    }

    /**
     * Obtain data
     *
     * @return array
     */
    public function listData()
    {
        /** @var \App\Mainframe\Basemodule $Model */
        /** @var \Illuminate\Database\Eloquent\Builder $q */
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $Model = model($this->moduleName);

        if (Request::has('columns')) {
            $q = $Model::select(explode(',', Request::get('columns')));
        } else {
            $q = new $Model;
        }

        // Eager load
        if (Request::has('with')) {
            $with = Request::get('with');
            $q = $q->with(explode(',', $with));
        }
        // Force is_active = 1
        $q->where('is_active', 1);

        // Construct query based on filter param
        $q = $this->filterQueryConstructor($q);

        // Get total count with out offset and limit.
        $total = $q->count();

        // Sort
        $sort_by = 'created_at';
        if (Request::has('sort_by')) {
            $sort_by = Request::get('sort_by');

        }
        $sort_order = 'desc';
        if (Request::has('sort_order')) {
            $sort_order = Request::get('sort_order');
        }
        $q = $q->orderBy($sort_by, $sort_order);

        // set offset
        $offset = 0;
        if (Request::has('offset')) {
            $offset = Request::get('offset');
            $q = $q->skip($offset);
        }

        //set limit
        $limit = $max_limit = 20;
        if (Request::has('limit') && Request::get('limit') <= $max_limit) {
            $limit = Request::get('limit');
        }
        // Limit override - Force all data with no limit.
        if (Request::get('force_all_data') === 'true') {
            $limit = $q->remember(cacheTime('none'))->count();
        }
        $q = $q->take($limit);

        /*********** Query construction ends ********************/

        // $items = $q->remember(cacheTime('none'))->get();
        $items = $q->get();

        return compact('items', 'total', 'offset', 'limit');
    }

    /**
     * Json return query constructor
     *
     * @param $q \Illuminate\Database\Query\Builder
     * @return \App\Mainframe\Basemodule
     */
    public function filterQueryConstructor($q)
    {
        $Model = model($this->moduleName);
        $text_fields = $Model::$text_fields;
        //$module_sys_name = $this->moduleName;

        /** @var \App\Mainframe\Basemodule $q */
        /** @var \App\Mainframe\Basemodule $Model */
        // $q = $q->where('is_active', 1);

        if (inTenantContext($this->moduleName)) {
            $q = injectTenantIdInModelQuery($this->moduleName, $q);
        }

        # Generic API return
        if (Request::has('updated_since')) {
            $q = $q->where('updated_at', '>=', Request::get('updatedSince'));
        }
        if (Request::has('created_since')) {
            $q = $q->where('created_at', '>=', Request::get('createdSince'));
        }

        if (Request::has('fieldName') && Request::has('fieldValue')) {
            $fieldName = Request::get('fieldName');
            $fieldValue = Request::get('fieldValue');
            $q = $q->where($fieldName, $fieldValue);
        }

        $q_fields = columns($this->moduleName); // Get all table field names
        foreach (Request::all() as $name => $val) { // Loop through all the fields in request
            if (in_array($name, $q_fields)) { // If field is available
                if (is_array($val) && count($val)) { // If array check whereIn()
                    $temp = removeEmptyVals($val);
                    if (count($temp)) {
                        $q = $q->whereIn($name, $temp);
                    }
                } else {
                    if (strlen($val) && strpos($val, ',') !== false) { // If CSV then convert to array and check whereIn()
                        $q = $q->whereIn($name, explode(',', $val));
                    } else {
                        if (strlen($val)) {

                            if ($val === 'null') { // Check if value is null
                                $q = $q->whereNull($name);
                            } else {
                                if (in_array($name, $text_fields)) {
                                    $q = $q->where($name, 'LIKE', "%$val%"); // For select2
                                } else {
                                    $q = $q->where($name, $val); // Before select2
                                }
                            }
                        }
                    }
                }
            }
        }

        return $q;

    }

}