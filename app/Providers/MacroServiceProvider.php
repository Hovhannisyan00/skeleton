<?php

namespace App\Providers;

use App\Macros\BluePrintMacros;
use App\Macros\QueryBuilderMacros;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;
use ReflectionException;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * @throws ReflectionException
     */
    public function boot(): void
    {
        Builder::mixin(new QueryBuilderMacros());

        Blueprint::mixin(new BluePrintMacros());
    }
}
