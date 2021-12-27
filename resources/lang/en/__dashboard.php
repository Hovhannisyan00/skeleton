<?php

return array(
    'menu' =>
        array(
            'translation-manager' => 'Translation Manager',
            'articles' => 'Articles',
            'users' => 'Users',
            'research-areas' => 'Research Areas',
        ),
    'user' =>
        array(
            'index' =>
                array(
                    'title' => 'Users',
                    'create' => 'Create User'
                ),

            'form' => [
                'add' => [
                    'title' => 'Create User'
                ]
            ]
        ),

    'article' => [
        'form' => [
            'edit' => [
                'title' => 'Articles',
                'create' => 'Create Article',
                'description' => '',
            ],

            'add' => [
                'title' => 'Create Article',
                'description' => '',
            ]
        ],

        'index' => [
            'title' => 'Articles',
            'create' => 'Create Article',
            'description' => '',
        ],
    ],

    'button' => [
        'search' => 'Search',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
    ],

    'label' => [
        'id' => 'ID',
        'name' => 'Name',
        'slug' => 'Slug',
        'publish_date' => 'Publish date',
        'created_at' => 'Created at',
        'actions' => 'Actions',
        'photo' => 'Photo',
        'title' => 'Title',
        'short_description' => 'Short description',
        'description' => 'Description',
        'meta_description' => 'Meta description',
        'meta_title' => 'Meta Title',
        'keywords' => 'Keywords',
        'uploaded_files' => 'Uploaded files',
        'show_status' => 'Show status',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'E-mail',
        'roles' => 'Roles',
        'role_ids' => 'Roles',
        'signature' => 'Signature',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
    ],

    'select' => [
        'option' => [
            'show_status_1' => 'Active',
            'show_status_2' => 'In Active'
        ]
    ],

    'modal' => [
        'are_you_sure' => 'Are you sure?',
        'confirm_action' => 'Confirm action'
    ],

    'translations' => [
        'title' => 'Translations Manager'
    ],

    'message' => [
        'successfully_created' => 'Successfully Created',
        'successfully_updated' => 'Successfully Updated',
        'successfully_deleted' => 'Successfully Deleted',
    ]
);
