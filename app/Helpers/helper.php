<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


function m_lang_icon_path($lang = null): string
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

function active_link($path = '', $prefix = '/_dashboard')
{
    $path = $path ? '/' . $path : '';
    return Request::is(LaravelLocalization::getCurrentLocale() . $prefix . $path);
}

if (!function_exists('getAllRoutesName')) {
    /**
     * Function to return all routes name
     *
     * @return array
     */
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

if (!function_exists("getJsDateFormatFront")) {
    function getJsDateFormatFront()
    {
        return config('dashboard.js.date_format_front');
    }
}

if (!function_exists("formattedDate")) {
    function formattedDate($date): string
    {
        return Carbon::parse($date)->format(getDateFormatFront());
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
                'date_format_front' => getJsDateFormatFront(),
            ]
        ];
    }
}

/* ========================================================================================
                                Date Helper Functions - End
 ======================================================================================== */



