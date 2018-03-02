<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | The default views that the filer will use.
    |
     */

    'views'                    => [
        'upload' => 'filer::upload',
        'show'   => 'filer::show',
        'edit'   => 'filer::edit',
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload Folder
    |--------------------------------------------------------------------------
    |
    | Folder the Uploader will use.
    | This will need to writable by the web server.
    | Recommendation: public/uploads/
    |
     */

    'folder'                   => 'uploads',

    'folder_permission'        => 0777, // Default 0777 - Other likely values 0775, 0755

    /*
    |--------------------------------------------------------------------------
    | Upload Filer
    |--------------------------------------------------------------------------
    |
    | Configuration items for uploaded filer.
    |
     */

    'allowed_types_check'      => false,

    'allowed_types'            => ['image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'application/zip', 'application/x-compressed-zip', 'text/plain'],

    'allowed_extensions_check' => true,

    'allowed_extensions'       => ['png', 'gif', 'jpg', 'jpeg', 'doc',
        'docx', 'pdf', 'xls', 'xlsx', 'mp3', 'txt', 'zip', 'bmp', 'jpeg'], // Case insensitive

                                           // Max upload size - In BYTES. 1GB = 1073741824 bytes, 10 MB = 10485760, 1 MB = 1048576
    'max_upload_size'          => 5242880, // Converter - http://www.beesky.com/newsite/bit_byte.htm

                                        // [True] will change all uploaded file names to an obfuscated name. (Example_Image.jpg becomes Example_Image_p4n8wfnt8nwh5gc7ynwn8gtu4se8u.jpg)
                                        // [False] attempts to leaves the filename as is.
    'obfuscate_filenames'      => true, // True/False

    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    |
    | Configuration items for image filer.
    |
     */

    // Enabled image manipulation for uploaded images.
    'image_manipulation'       => true,

    // Must be in the upload list as well.
    // Must also be supported by invention. http://intervention.olivervogel.net/image/formats/image
    'image_types'              => ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'],

    'image_extensions'         => ['png', 'gif', 'jpg', 'jpeg'], // Case insensitive

    'image_resize_on_upload'   => true,

    'image_max_size'           => ['w' => 2000, 'h' => 2000],

    // Image size
    'size'                     => [
        'xs' => [
            'width'     => '150',
            'height'    => '150',
            'action'    => 'fit',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],
        'sm' => [
            'width'     => '180',
            'height'    => '180',
            'action'    => 'fit',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],
        'md' => [
            'width'     => '230',
            'height'    => '298',
            'action'    => 'fit',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],
        'lg' => [
            'width'     => '346',
            'height'    => '240',
            'action'    => 'fit',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '870',
            'height'    => '450',
            'action'    => 'resize',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],

        'xxl' => [
            'width'     => '870',
            'height'    => '600',
            'action'    => 'fit',
            'default'   => 'img/noimage.jpg',
            'watermark' => 'img/logo/default.png',
        ],
    ],
];
