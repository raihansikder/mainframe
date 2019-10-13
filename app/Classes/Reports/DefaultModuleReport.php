<?php

namespace App\Classes\Reports;

class DefaultModuleReport extends IsoReportBuilder
{
    /**
     * @param $query   \Illuminate\Database\Query\Builder
     * @return mixed
     */
    public function filters($query)
    {
        /** @var array $escape_fields */
        $escape_fields = []; // Default filter logic will not apply on these

        foreach ($this->request as $name => $val) {
            if (in_array($name, $escape_fields)) {
                // Process custom filters test1,test2,test3
            } else {
                $query = $this->defaultFilter($query, $name, $val);
            }
        }

        if ($this->additionalFilterConditions()) {
            $query = $query->whereRaw($query, $this->additionalFilterConditions());
        }

        $query = $query->whereNull('deleted_at');

        return $query;
    }

}