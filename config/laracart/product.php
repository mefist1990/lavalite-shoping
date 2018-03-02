<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'laracart',

    /*
     * Package.
     */
    'package'   => 'product',

    /*
     * Modules.
     */
    'modules'   => ['product'],

    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '230',
            'height'    => '298',
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

    'product'       => [
        'model'             => 'Laracart\Product\Models\Product',
        'table'             => 'products',
        'presenter'         => \Laracart\Product\Repositories\Presenter\ProductItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'model',  'download',  'related_products',  'name',  'price',  'status',  'quantity',  'description',  'return_policy',  'meta_title',  'meta_description',  'meta_keyword', 'premium','featured', 'tags',    'sku',  'upc',  'ean',  'jan',  'isbn',  'mpn',  'location',  'tax_class',  'substract_stock',  'outofstock_status',  'seo_keyword',  'order',  'dimensions',  'weight_class',  'length_class',  'date_available',  'manufacturer',  'attributes',  'discounts',  'special',  'images'],
        'translate'         => [],

        'upload_folder'     => 'product/product',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => ['images'],
                               ],
        'casts'             => [
                     'images' =>'array',
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status'=>'like',
            'model'=>'like',
            'description'=>'like',
            'quantity'=>'=',
            'price'      => [
                'condition' => 'between',
                'default'   => [0, 50000],
            ],
        ],
        /*
        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "Product created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Product completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Product verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Product approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Product published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Product unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Product archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Product deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
];
