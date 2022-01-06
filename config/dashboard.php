<?php

return [
    'date_format' => env('DATE_FORMAT', 'Y-m-d'),
    'date_format_front' => env('DATE_FORMAT_FRONT', 'd.m.Y'),
    'date_time_format' => env('DATE_TIME_FORMAT', 'Y-m-d H:i:s'),
    'date_time_format_front' => env('DATE_TIME_FORMAT_FRONT', 'd.m.Y H:i:s'),
    'js' => [
        'date_format' => env('JS_DATE_FORMAT', 'yyyy-mm-dd'),
        'date_format_front' => env('JS_DATE_FORMAT_FRONT', 'dd.mm.yyyy'),
    ],

    'show_notification' => env('SHOW_NOTIFICATION', true)
];
