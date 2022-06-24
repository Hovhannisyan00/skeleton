<?php

namespace App\Providers;

use App\Facades\MetaData;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // MetaData
        view()->share('meta', MetaData::getDefaultData());
    }
}
