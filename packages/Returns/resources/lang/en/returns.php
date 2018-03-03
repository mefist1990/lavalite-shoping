<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Returns',
    'names'         => 'Returns',
    'title'       => [
        'user'  => 'My Returns',
        'admin' => 'Returns',
        'sub'   => [
            'user'  => 'Returns created by me',
            'admin' => 'Returns',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [

    'status'              => ['Awaiting'=>'Awaiting','Complete'=>'Complete','Pending'=>'Pending'],
    'return_action'       => ['Credit Issued'=>'Credit Issued','Refunded'=>'Refunded','Replacement Sent'=>'Replacement Sent'],
    'opened'            => [
                                         'Yes'=> ['name'=>'opened','value'=>'Yes'],
                                         'No'=> ['name'=>'opened','value'=>'No'],
                                    ],
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                  => 'Please enter Return',
        'order_id'                   => ' Order',
        'product_id'                 => 'Product',
        'customer_id'                => 'Customer ',
        'return_reason_id'           => 'Return Reason',
        'return_action'              => 'Return Action',
        'status'                     => 'Status',
        'comment'                    => 'Please enter comment',
        'date_ordered'               => 'Date ordered',
        'date_added'                 => 'Date added',
        'date_modified'              => 'Date Modified',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                  => 'Return',
        'order_id'                   => 'Order',
        'product_id'                 => 'Product',
        'customer_id'                => 'Customer ',
        'return_reason_id'           => 'Return Reason ',
        'return_action'              => 'Return Action',
        'status'                     => 'status',
        'comment'                    => 'Comment',
        'date_ordered'               => 'Date ordered',
        'date_added'                 => 'Date added',
        'date_modified'              => 'Date Modified',
        'status'                     => 'Status',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
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
