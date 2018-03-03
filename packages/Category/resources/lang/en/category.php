<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Category',
    'names'         => 'Categories',
    'title'       => [
        'user'  => 'My Categories',
        'admin' => 'Categories',
        'sub'   => [
            'user'  => 'Categories created by me',
            'admin' => 'Categories',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'status'              => ['Enabled'=>'Enabled','Disabled'=>'Disabled'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'parent_id'                  => 'Select Parent',
        'name'                       => 'Category Name',
        'status'                     => 'Select Status',
        'meta_title'                 => 'Meta Title',
        'meta_description'           => 'Meta Description',
        'meta_keyword'               => 'Meta Keyword',
        'image'                      => 'Image',
        'top'                        => 'Top',
        'order'                      => 'Order',
        'icon'                       => 'Icon',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'parent_id'                  => 'Parent',
        'name'                       => 'Name',
        'status'                     => 'Status',
        'meta_title'                 => 'Meta Title',
        'meta_description'           => 'Meta Description',
        'meta_keyword'               => 'Meta Keyword',
        'image'                      => 'Image',
        'top'                        => 'Top',
        'order'                      => 'Order',
        'icon'                       => 'Icon',
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
