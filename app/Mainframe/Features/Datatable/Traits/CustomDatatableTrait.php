<?php

namespace App\Mainframe\Features\Datatable\Traits;

use App\Mainframe\Features\Datatable\Datatable;

/** @mixin Datatable */
trait CustomDatatableTrait
{

    /**
     * Ajax URL for json source
     *
     * @return string
     */
    public function ajaxUrl()
    {
        if ($this->ajaxUrl) {
            $url = $this->ajaxUrl;
        } else {
            $url = route('datatable.json', classKey($this));
        }

        // Get custom data table URL
        $params = parse_url(\URL::full(), PHP_URL_QUERY);
        if (!str_contains($url, '?')) {
            $params = '?'.$params;
        }

        return $url.$params;
    }
}