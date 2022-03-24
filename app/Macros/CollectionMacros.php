<?php

namespace App\Macros;

use Closure;

class CollectionMacros
{
    /**
     * Function to get data for select
     *
     * @return Closure
     */
    public function getForSelect(): Closure
    {
        return function (string $column = 'name', string $key = 'id') {
            return $this->pluck($column, $key);
        };
    }

    /**
     * Function to get relation pluck data
     *
     * @return Closure
     */
    public function pluckColumn(): Closure
    {
        return function (string $column = 'id') {
            return $this->pluck($column)->all();
        };
    }
}
