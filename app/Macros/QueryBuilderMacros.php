<?php

namespace App\Macros;

use Closure;

/**
 * Class QueryBuilderMacros
 * @package App\Macros
 */
class QueryBuilderMacros
{
    /**
     * Function to search by like
     *
     * @return Closure
     */
    public function like(): Closure
    {
        return function (string $attribute, string $searchTerm) {
            return $this->where($attribute, 'like', "%$searchTerm%");
        };
    }
}
