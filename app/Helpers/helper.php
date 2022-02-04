<?php

use App\Models\RoleAndPermission\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/* ========================================================================================
                                Route Helper Functions - Start
 ======================================================================================== */

if (!function_exists("urlWithLng")) {
    function urlWithLng($url)
    {
        return url(currentLanguageCode() . '/' . ltrim($url, '/'));
    }
}

if (!function_exists('routeWithLng')) {
    function routeWithLng($name, $parameters = [], $absolute = true)
    {
        return app('url')->route($name, $parameters, $absolute);
    }
}

if (!function_exists("dashboardRoute")) {
    function dashboardRoute($name)
    {
        return route('dashboard.' . $name);
    }
}

if (!function_exists("routeIs")) {
    function routeIs($name)
    {
        return Route::is($name);
    }
}

/* ========================================================================================
                                Route Helper Functions - End
 ======================================================================================== */


/* ========================================================================================
                                Translation Helper Functions - Start
 ======================================================================================== */

if (!function_exists("currentLanguageCode")) {
    function currentLanguageCode(): string
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

if (!function_exists("getSupportedLocales")) {
    function getSupportedLocales(): array
    {
        return LaravelLocalization::getSupportedLanguagesKeys();
    }
}

if (!function_exists("currentLanguageName")) {
    function currentLanguageName(): string
    {
        return LaravelLocalization::getCurrentLocaleName();
    }
}

if (!function_exists("currentLanguageImg")) {
    function currentLanguageImg()
    {
        return LaravelLocalization::getSupportedLocales()[LaravelLocalization::getCurrentLocale()]['img'];
    }
}

if (!function_exists("languageDisplayName")) {
    function languageDisplayName($lang)
    {
        return LaravelLocalization::getSupportedLocales()[$lang]['displayName'];
    }
}

if (!function_exists("getTrans")) {
    function getTrans(): array
    {
        $exceptTransFile = [
            'auth',
            'pagination',
            'passwords',
            'validation'
        ];

        $langFiles = File::files(resource_path() . '/lang/' . currentLanguageCode());

        $trans = [];
        foreach ($langFiles as $f) {
            $filename = pathinfo($f)['filename'];
            if (!in_array(pathinfo($f)['filename'], $exceptTransFile)) {
                $trans[$filename] = trans($filename);
            }
        }

        return $trans;
    }
}

/* ========================================================================================
                                Translation Helper Functions - End
 ======================================================================================== */

if (!function_exists('langIconPath')) {

    function langIconPath($lang = null): string
    {
        switch ($lang) {
            case  'ru':
                return '/img/Flag_of_Russia.svg';
            case  'hy':
                return '/img/Armenia_-_Rounded_Rectangle.svg';
            default:
                return '/img/united-states.svg';
        }
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
                    'uri' => $value->uri(),
                    'parameters' => $value->parameterNames()
                ];
            }
        }
        return $routesName;
    }
}

/* ========================================================================================
                                Date Helper Functions - Start
 ======================================================================================== */

if (!function_exists("getDateFormat")) {
    function getDateFormat()
    {
        return config('dashboard.date_format');
    }
}

if (!function_exists("getDateFormatFront")) {
    function getDateFormatFront()
    {
        return config('dashboard.date_format_front');
    }
}

if (!function_exists("getDateTimeFormat")) {
    function getDateTimeFormat()
    {
        return config('dashboard.date_time_format');
    }
}

if (!function_exists("getDateTimeFormatFront")) {
    function getDateTimeFormatFront()
    {
        return config('dashboard.date_time_format_front');
    }
}

if (!function_exists("formattedDate")) {
    function formattedDate($date): string
    {
        return Carbon::parse($date)->format(getDateFormatFront());
    }
}

if (!function_exists("formatDateForBackend")) {
    function formatDateForBackend($date): string
    {
        return $date ? Carbon::createFromFormat(getDateFormatFront(), $date)->format(getDateFormat()) : '';
    }
}

if (!function_exists("formatDateTimeForBackend")) {
    function formatDateTimeForBackend($dateTime): string
    {
        return $dateTime ? Carbon::createFromFormat(getDateTimeFormatFront(), $dateTime)->format(getDateTimeFormat()) : '';
    }
}

if (!function_exists("getDashboardDates")) {
    function getDashboardDates(): array
    {
        return [
            'date_format' => getDateFormat(),
            'date_format_front' => getDateFormatFront(),
            'date_time_format' => getDateTimeFormat(),
            'date_time_format_front' => getDateTimeFormatFront(),
            'js' => [
                'date_format' => config('dashboard.js.date_format'),
                'date_time_format' => config('dashboard.js.date_time_format'),
            ]
        ];
    }
}

/* ========================================================================================
                                Date Helper Functions - End
 ======================================================================================== */


/* ========================================================================================
                                Roles Helper Functions - Start
 ======================================================================================== */


if (!function_exists("getRoles")) {
    function getRoles(): array
    {
        $roles = [];
        foreach (Role::ROLES as $role) {
            $roles[Str::upper($role)] = $role;
        }
        return $roles;
    }
}

if (!function_exists("getRolesIdName")) {
    function getRolesIdName(): array
    {
        $roles = [];
        foreach (Role::all() as $role) {
            $roles[Str::upper($role->name)] = (string)$role->id;
        }

        return $roles;
    }
}

if (!function_exists("getAuthUserRolesName")) {
    function getAuthUserRolesName(): array
    {
        return Auth::user()->roles->pluck('name')->all();
    }
}

/* ========================================================================================
                                Roles Helper Functions - End
 ======================================================================================== */


/* ========================================================================================
                                String Helper Functions - Start
 ======================================================================================== */


if (!function_exists("getNameDot")) {
    function getArrayNameDot($name): string
    {
        $name = str_replace(['[', ''], '.', $name);
        $name = str_replace([']', ''], '', $name);

        return $name;
    }
}


/* ========================================================================================
                                String Helper Functions - End
 ======================================================================================== */
