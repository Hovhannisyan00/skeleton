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

    public function likeOr(): Closure
    {
        return function (array $fields, array $searchFields = [], Closure $orWhere = null) {
            $searchTerm = $searchFields['search'];
            $searchFields = array_filter($searchFields);

            $fields = array_diff($fields, array_keys($searchFields));

            return $this->orWhere(function ($q) use ($fields, $searchTerm, $orWhere) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', "%$searchTerm%");
                }

                if ($orWhere) {
                    $q->orWhere($orWhere);
                }
            });
        };
    }
}
