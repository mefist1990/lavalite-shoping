<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Review',
    'names'         => 'Reviews',
    'title'       => [
        'user'  => 'My Reviews',
        'admin' => 'Reviews',
        'sub'   => [
            'user'  => 'Reviews created by me',
            'admin' => 'Reviews',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'status'              => ['Publish'=>'Publish','Draft'=>'Draft'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'product_id'                 => 'Please enter product',
        'description'                => 'Please enter description',
        'status'                     => 'Please enter status',
        'score'                      => 'Please enter score',
        'title'                      => 'Please enter title',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'product_id'                 => 'Product',
        'description'                => 'Description',
        'status'                     => 'Status',
        'score'                      => 'Score',
        'title'                      => 'Title',
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
