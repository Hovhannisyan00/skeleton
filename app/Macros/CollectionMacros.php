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
}
