<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'laracart',

    /*
     * Package.
     */
    'package'   => 'returns',

    /*
     * Modules.
     */
    'modules'   => ['returns', 
'return_reason'],

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

    'returns'       => [
        'model'             => 'Laracart\Returns\Models\Returns',
        'table'             => 'returns',
        'presenter'         => \Laracart\Returns\Repositories\Presenter\ReturnsItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => [],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id',  'order_id',  'product_id','product','model','quantity','opened',  'return_reason_id',  'return_action',  'return_status_id','status',  'comment',  'date_ordered'],
        'translate'         => [],

        'upload_folder'     => 'returns/returns',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'order_id'  => '=',
            'product'  => 'like',
            'return_reason_id' => '=',
            'user_id'  => '=',
            'status'=>'like',
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
                    'label'  => "Returns created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Returns completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Returns verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Returns approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Returns published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Returns unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Returns archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Returns deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
'return_reason'       => [
        'model'             => 'Laracart\Returns\Models\ReturnReason',
        'table'             => 'return_reasons',
        'presenter'         => \Laracart\Returns\Repositories\Presenter\ReturnReasonItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => [],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => [ 'language_id',  'name'],
        'translate'         => [],

        'upload_folder'     => 'returns/return_reason',
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
            'status'=>'like',
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
                    'label'  => "ReturnReason created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "ReturnReason completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "ReturnReason verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "ReturnReason approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "ReturnReason published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "ReturnReason unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "ReturnReason archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "ReturnReason deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],
        */
    ],
];
