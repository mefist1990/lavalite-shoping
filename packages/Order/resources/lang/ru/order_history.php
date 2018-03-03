<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Order History',
    'names'         => 'Order Histories',
    'title'       => [
        'user'  => 'My Order Histories',
        'admin' => 'Order Histories',
        'sub'   => [
            'user'  => 'Order Histories created by me',
            'admin' => 'Order Histories',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'order_id'                   => 'Please enter order',
        'order_status_id'            => 'Please enter order status',
        'notify'                     => 'Please enter notify',
        'comment'                    => 'Please enter comment',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'order_id'                   => 'Order',
        'order_status_id'            => 'Order Status',
        'notify'                     => 'Notify Customer',
        'comment'                    => 'Comment',
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
