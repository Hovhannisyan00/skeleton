<?php

namespace App\Macros;

use Closure;

class QueryBuilderMacros
{
    public function like(): Closure
    {
        return function (string $attribute, string $searchTerm) {
            return $this->where($attribute, 'like', "%$searchTerm%");
        };
    }
}
