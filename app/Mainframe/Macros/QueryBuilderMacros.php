<?php

namespace App\Mainframe\Macros;

use Illuminate\Database\Query\Builder;

/** @mixin Builder $this */
class QueryBuilderMacros
{

    public function whereSubstring()
    {
        return function ($attribute, $needles) {

            /** @var Builder $this */
            return $this->where(function (Builder $query) use ($attribute, $needles) {

                foreach (array_wrap($needles) as $needle) {
                    $query->orWhere($attribute, 'LIKE', "%{$needle}%");
                }

            });
        };
    }

}