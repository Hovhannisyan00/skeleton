<?php

return array(
    'title' => "Dashboard",

    'global' => [
        'log_out' => "logout",
    ],
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
                    'title' => 'Create User',
                ],
                'edit' => [
                    'title' => 'Edit User',
                    'description' => '',
                ],
            ]
        ),

    'article' => [
        'form' => [
            'edit' => [
                'title' => 'Edit Article',
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

    'profile' => [

        'index' => [
            'title' => 'My Profile',
            'description' => '',
        ],

        'dropdown' => 'My Profile'
    ],

    'button' => [
        'search' => 'Search',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'add_more' => 'Add more',
        'crop' => 'Crop',
        'create' => 'Create',
    ],

    'label' => [
        'id' => 'ID',
        'name' => 'Name',
        'slug' => 'Slug',
        'select' => 'Select',
        'publish_date' => 'Publish date',
        'created_at' => 'Created at',
        'actions' => 'Actions',
        'photo' => 'Photo',
        'title' => 'Title',
        'short_description' => 'Short description',
        'description' => 'Description',
        'meta_description' => 'Meta description',
        'meta_title' => 'Meta Title',
        'meta_keywords' => 'Meta Keywords',
        'uploaded_files' => 'Uploaded files',
        'uploaded_file' => 'Uploaded file',
        'show_status' => 'Show status',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'E-mail',
        'roles' => 'Roles',
        'role_ids' => 'Roles',
        'signature' => 'Signature',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'grouped_title' => 'Title',
        'grouped_link' => 'Link',
        'multiple_author' => 'Author',
        'release_date_time' => 'Release datetime',
        'avatar' => 'Avatar',
        'current_password' => 'Current password',
        'new_password' => 'New password',
        'new_password_confirmation' => 'Confirm New Password',
    ],

    'select' => [
        'option' => [
            'show_status_1' => 'Active',
            'show_status_2' => 'Inactive',
            'default' => 'Select',
            'all' => 'All',
        ],

    ],

    'modal' => [
        'are_you_sure' => 'Are you sure?',
        'confirm_action' => 'Confirm action',
        'title' => [
            'info' => "Modal info title"
        ]
    ],

    'translations' => [
        'title' => 'Translations Manager'
    ],

    'message' => [
        'successfully_created' => 'Successfully Created',
        'successfully_updated' => 'Successfully Updated',
        'successfully_deleted' => 'Successfully Deleted',
    ],

    'tab' => [
        'general' => 'General',
    ],
);
