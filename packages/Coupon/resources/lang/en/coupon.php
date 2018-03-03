<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Coupon',
    'names'         => 'Coupons',
    'title'       => [
        'user'  => 'My Coupons',
        'admin' => 'Coupons',
        'sub'   => [
            'user'  => 'Coupons created by me',
            'admin' => 'Coupons',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'type'                => ['Percentage'=>'Percentage','Fixed Amount'=>'Fixed Amount'],
            'status'              => ['Enabled'=>'Enabled','Disabled'=>'Disabled'],
             'logged'       => [
                                         'Yes'=> ['name'=>'logged','value'=>'Yes'],
                                         'No'=> ['name'=>'logged','value'=>'No'],
                                    ],
             'shipping'       => [
                                         'Yes'=> ['name'=>'shipping','value'=>'Yes'],
                                         'No'=> ['name'=>'shipping','value'=>'No'],
                                    ],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'name'                       => 'Please enter name',
        'description'                => 'Please enter description',
        'code'                       => 'Please enter code',
        'type'                       => 'Please enter type',
        'discount'                   => 'Please enter discount',
        'logged'                     => 'Please enter logged',
        'shipping'                   => 'Please enter shipping',
        'total'                      => 'Please enter total',
        'start_date'                 => 'Please enter start date',
        'end_date'                   => 'Please enter end date',
        'uses_total'                 => 'Uses Per Coupon',
        'uses_customer'              => 'Uses Per Customer',
        'status'                     => 'Please enter status',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'name'                       => 'Name',
        'description'                => 'Description',
        'code'                       => 'Code',
        'type'                       => 'Type',
        'discount'                   => 'Discount',
        'logged'                     => 'Logged',
        'shipping'                   => 'Shipping',
        'total'                      => 'Total',
        'start_date'                 => 'Start Date',
        'end_date'                   => 'End Date',
        'uses_total'                 => 'Uses total',
        'uses_customer'              => 'Uses customer',
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
