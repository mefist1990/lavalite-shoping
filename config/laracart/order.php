<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'laracart',

    /*
     * Package.
     */
    'package'   => 'order',

    /*
     * Modules.
     */
    'modules'   => ['order', 
'order_status'],

    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

    ],

    'order'       => [
        'model'             => 'Laracart\Order\Models\Order',
        'table'             => 'orders',
        'presenter'         => \Laracart\Order\Repositories\Presenter\OrderItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => [],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id','payment_address', 'shipping_address','shipping_method','payment_method','payment_status','shipping_method_description','payment_method_description','total','subtotal','coupon_id','invoice_no',  'invoice_prefix',  'store_id',  'store_name',  'store_url',  'customer_id',  'customer_group_id',  'firstname',  'lastname',  'email',  'telephone',  'fax',  'custom_field',     'payment_custom_field',    'payment_code',    'shipping_custom_field',    'shipping_code',  'comment',    'order_status_id',  'affiliate_id',  'commission',  'marketing_id',  'tracking',  'language_id',  'currency_id',  'currency_code',  'ip',  'forwarded_ip',  'user_agent',  'accept_language'],
        'translate'         => [],

        'upload_folder'     => 'order/order',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'total'  => 'like',
            'subtotal'  => 'like',
            'user_id'  => '=',
            'order_status_id'=> '=',
            'created_at' => 'like',
            'updated_at' => 'like',
        ],
        /*
        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "Order created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Order completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Order verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Order approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Order published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Order unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Order archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Order deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
'order_status'       => [
        'model'             => 'Laracart\Order\Models\OrderStatus',
        'table'             => 'order_statuses',
        'presenter'         => \Laracart\Order\Repositories\Presenter\OrderStatusItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => [],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'name'],
        'translate'         => [],

        'upload_folder'     => 'order/order_status',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'created_at',
            'updated_at',
            
        ],
        /*
        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "OrderStatus created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "OrderStatus completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "OrderStatus verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "OrderStatus approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "OrderStatus published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "OrderStatus unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "OrderStatus archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "OrderStatus deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
'order_history'       => [
        'model'             => 'Laracart\Order\Models\OrderHistory',
        'table'             => 'order_histories',
        'presenter'         => \Laracart\Order\Repositories\Presenter\OrderHistoryItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => [],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['order_id',  'order_status_id',  'notify',  'comment'],
        'translate'         => [],

        'upload_folder'     => 'order/order_history',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'order_id'  => 'like',
            'created_at',
            'updated_at',
            'order_status_id',
        ],
        /*
        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "OrderHistory created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "OrderHistory completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "OrderHistory verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "OrderHistory approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "OrderHistory published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "OrderHistory unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "OrderHistory archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "OrderHistory deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
];
