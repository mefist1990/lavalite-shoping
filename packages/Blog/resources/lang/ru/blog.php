<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Blog',
    'names'         => 'Blogs',
    'title'       => [
        'user'  => 'My Blogs',
        'admin' => 'Blogs',
        'sub'   => [
            'user'  => 'Blogs created by me',
            'admin' => 'Blogs',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'status'              => ['Hide'=>'Hide','Show'=>'Show'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'category_id'                => 'Please select category ',
        'title'                      => 'Please enter title',
        'details'                    => 'Please enter details',
        'image'                      => 'Please enter image',
        'images'                     => 'Please enter images',
        'viewcount'                  => 'Please enter viewcount',
        'status'                     => 'Please select status',
        'posted_on'                  => 'Please select posted on ',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'category_id'                => 'Category ',
        'title'                      => 'Title',
        'details'                    => 'Details',
        'image'                      => 'Image',
        'images'                     => 'Images',
        'viewcount'                  => 'View count',
        'status'                     => 'Status',
        'posted_on'                  => 'Posted on',
        'status'                     => 'Status',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Name',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
