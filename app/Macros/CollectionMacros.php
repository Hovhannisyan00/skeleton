<?php

namespace App\Macros;

use Closure;

class CollectionMacros
{
    /**
     * @param string $column
     * @param string $key
     * @return Closure
     */
    public function getForSelect(string $column = 'name', string $key = 'id'): Closure
    {
        return function () use ($column, $key) {
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
