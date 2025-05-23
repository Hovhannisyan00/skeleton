<?php

namespace App\Models\Scopes\Menu;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserMenuScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->whereHas('roles', function ($q) {
            $q->whereIn('id', Auth::user()->roles->pluck('id')->all());
        });
    }
}
