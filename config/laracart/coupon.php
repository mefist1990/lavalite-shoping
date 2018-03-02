<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'laracart',

    /*
     * Package.
     */
    'package'   => 'coupon',

    /*
     * Modules.
     */
    'modules'   => ['coupon'],

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

    'coupon'       => [
        'model'             => 'Laracart\Coupon\Models\Coupon',
        'table'             => 'coupons',
        'presenter'         => \Laracart\Coupon\Repositories\Presenter\CouponItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'name',  'description',  'code',  'type',  'discount',  'logged',  'shipping',  'total',  'start_date',  'end_date',  'uses_total',  'uses_customer',  'status'],
        'translate'         => [],

        'upload_folder'     => 'coupon/coupon',
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
            'code'  => 'like',
            'type'  => 'like',
            'discount'  => 'like',
            'start_date',
            'end_date',
            'created_at' => 'like',
            'updated_at' => 'like',
            'status',
        ],
        /*
        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "Coupon created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Coupon completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Coupon verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Coupon approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Coupon published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Coupon unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Coupon archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Coupon deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
];
