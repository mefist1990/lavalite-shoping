<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Currency',
    'names'         => 'Currencies',
    'title'       => [
        'user'  => 'My Currencies',
        'admin' => 'Currencies',
        'sub'   => [
            'user'  => 'Currencies created by me',
            'admin' => 'Currencies',
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
        'title'                      => 'Please enter title',
        'code'                       => 'Please enter code',
        'symbol_left'                => 'Please enter symbol left',
        'symbol_right'               => 'Please enter symbol right',
        'decimal_place'              => 'Please enter decimal place',
        'value'                      => 'Please enter value',
        'status'                     => 'Please enter status',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'title'                      => 'Title',
        'code'                       => 'Code',
        'symbol_left'                => 'Symbol Left',
        'symbol_right'               => 'Symbol Right',
        'decimal_place'              => 'Decimal Place',
        'value'                      => 'Value',
        'status'                     => 'Status',
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
