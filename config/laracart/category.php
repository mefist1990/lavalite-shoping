<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'laracart',

    /*
     * Package.
     */
    'package'   => 'category',

    /*
     * Modules.
     */
    'modules'   => ['category'],

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

    'category'       => [
        'model'             => 'Laracart\Category\Models\Category',
        'table'             => 'categories',
        'presenter'         => \Laracart\Category\Repositories\Presenter\CategoryItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => ['path_name'],
        'fillable'          => ['user_id', 'parent_id',  'name','icon',  'status',  'meta_title',  'meta_description',  'meta_keyword',  'image',  'top',  'order', 'nest_left', 'nest_right', 'nest_depth'],
        'translate'         => [],

        'upload_folder'     => 'category/category',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => ['image'],
                               ],
        'casts'             => [
           'image'=>'array',
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status'=>'like',
            'parent_id'=>'=',
            'order'=>'like',
            'products.price'      => [
                'condition' => 'between',
                'default'   => [0, 50000],
            ],
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
                    'label'  => "Category created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Category completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Category verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Category approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Category published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Category unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Category archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Category deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
];
