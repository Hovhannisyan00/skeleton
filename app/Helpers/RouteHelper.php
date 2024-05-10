<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('urlWithLng')) {
    function urlWithLng($url): string
    {
        return url(currentLanguageCode().'/'.ltrim($url, '/'));
    }
}

if (!function_exists('routeWithLng')) {
    function routeWithLng($name, $parameters = [], $absolute = true): string
    {
        return app('url')->route($name, $parameters, $absolute);
    }
}

if (!function_exists('dashboardRoute')) {
    function dashboardRoute($name): string
    {
        return route('dashboard.'.$name);
    }
}

if (!function_exists('routeIs')) {
    function routeIs($name): bool
    {
        return Route::is($name);
    }
}

if (!function_exists('getAllRoutesName')) {
    function getAllRoutesName(): array
    {
        $routeCollection = Route::getRoutes()->get();
        $routesName = [];
        foreach ($routeCollection as $value) {
            if ($value->getName()) {
                $routesName[$value->getName()] = [
                    'uri' => str_replace('?', '', $value->uri()),
                    'parameters' => $value->parameterNames(),
                ];
            }
        }

        return $routesName;
    }
}
