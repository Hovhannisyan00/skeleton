<?php

use App\Models\Article\Article;
use App\Models\File\File;
use App\Models\User\User;

return [
    User::getClassName() => [
        'signature' => [
            'field_name' => 'signature',
            'file_type' => File::TYPE_IMAGE,
            'validation' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
//            'multiple' => true
        ],

        'avatar' => [
            'field_name' => 'avatar',
            'file_type' => File::TYPE_IMAGE,
            'validation' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'is_cropped' => true,
        ],
    ],

    Article::getClassName() => [
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
