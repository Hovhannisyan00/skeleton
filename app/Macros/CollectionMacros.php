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
     * @param string $column
     * @return Closure
     */
    public function pluckColumn(string $column = 'id'): Closure
    {
        return function () use ($column) {
            return $this->pluck($column)->all();
        };
    }
}
