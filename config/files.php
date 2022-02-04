<?php

use App\Models\File\File;

return [
    \App\Models\User\User::getClassName() => [
        'signature' => [
            'field_name' => 'signature',
            'file_type' => File::TYPE_IMAGE,
            'validation' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:4096'
        ],
    ],

    \App\Models\Article\Article::getClassName() => [
        'photo' => [
            'field_name' => 'photo',
            'file_type' => File::TYPE_IMAGE,
            'validation' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            /*'thumb' => [
                [
                    'width' => 300,
                    'height' => 200,
                ],
                [
                    'width' => 400,
                    'height' => '',
                ],
            ]*/
        ],
    ]
];
