<?php

namespace App\Mainframe\Features\Datatable\Traits;

use App\Mainframe\Features\Datatable\Datatable;

/** @mixin Datatable */
trait CustomDatatableTrait
{
    /**
     * Ajax URL for json source
     * Note: This method is required if a datatable is extended from module datatable but
     *  put under customer datatable.
     *
     * @return string
     */
    public function ajaxUrl()
    {

        if (!$this->ajaxUrl) {
            $this->ajaxUrl = route('datatable.json', classKey($this));
        }

        return urlWithParams($this->ajaxUrl, parse_url(\URL::full(), PHP_URL_QUERY));
    }
}