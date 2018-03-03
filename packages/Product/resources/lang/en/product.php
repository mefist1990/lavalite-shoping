<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Product',
    'names'         => 'Products',
    'title'       => [
        'user'  => 'My Products',
        'admin' => 'Products',
        'sub'   => [
            'user'  => 'Products created by me',
            'admin' => 'Products',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'status'              => ['Enabled'=>'Enabled','Disabled'=>'Disabled'],
            'substract_stock'     => ['Yes'=>'Yes','No'=>'No'],
            'outofstock_status'   => ['In stock'=>'In stock','Out of stock'=>'Out of stock','Pre-order'=>'Pre-order'],
            'weight_class'        => ['Kilogram'=>'Kilogram','Gram'=>'Gram','Pound'=>'Pound','Ounce'=>'Ounce'],
            'length_class'        => ['Centimeter'=>'Centimeter','Millimeter'=>'Millimeter','Inch'=>'Inch'],
            'tax_class'           => ['Taxable Goods'=>'Taxable Goods','Downloadable Products'=>'Downloadable Products'],
            'sort'                => ['name_ASC'=>'Name','price_DESC'=>'Price : Low to High','price_ASC'=>'Price : High to Low'],
            'show'                => ['3'=>'3','6'=>'6','9'=>'9'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'model'                      => 'Please enter model',
        'download'                   => 'Please enter download',
        'related_products'           => 'Please enter related products',
        'name'                       => 'Please enter product name',
        'price'                      => 'Please enter price',
        'status'                     => 'Please enter status',
        'quantity'                   => 'Please enter quantity',
        'description'                => 'Please enter description',
        'return_policy'              => 'Please enter return policy',
        'meta_title'                 => 'Please enter meta title',
        'meta_description'           => 'Please enter meta description',
        'meta_keyword'               => 'Please enter meta keyword',
        'premium'                    => 'Please enter premium',
        'featured'                   => 'Please enter featured',
        'tags'                       => 'Please enter product Tags',
        'image'                      => 'Image',
        'sku'                        => 'Please enter stock keeping unit',
        'upc'                        => 'Please enter Universal Product Code',
        'ean'                        => 'Please enter European Article Number',
        'jan'                        => 'Please enter Japanese Article Number',
        'isbn'                       => 'Please enter International Standard Book Number',
        'mpn'                        => 'Please enter Manufacturer Part Number',
        'location'                   => 'Please enter location',
        'tax_class'                  => 'Please enter tax class',
        'substract_stock'            => 'Please enter substract stock',
        'outofstock_status'          => 'Please enter out of stock status',
        'seo_keyword'                => 'Please enter seo keyword',
        'order'                      => 'Please enter order',
        'dimensions'                 => 'Please enter dimensions',
        'weight_class'               => 'Please enter weight class',
        'length_class'               => 'Please enter length class',
        'date_available'             => 'Please enter date available',
        'manufacturer'               => 'Please enter manufacturer',
        'attributes'                 => 'Please enter groups',
        'discounts'                  => 'Please enter discounts',
        'special'                    => 'Please enter special group',
        'images'                     => 'Images',
        'category'                   => 'Please enter category',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'model'                      => 'Model',
        'download'                   => 'Download',
        'related_products'           => 'Related products',
        'name'                       => 'Product Name',
        'price'                      => 'Price',
        'status'                     => 'Status',
        'quantity'                   => 'Quantity',
        'description'                => 'Description',
        'return_policy'              => 'Return policy',
        'meta_title'                 => 'Meta title',
        'meta_description'           => 'Meta description',
        'meta_keyword'               => 'Meta keyword',
        'premium'                    => 'Premium',
        'featured'                   => 'Featured',
        'tags'                       => 'Product Tags',
        'image'                      => 'Image',
        'sku'                        => 'SKU',
        'upc'                        => 'UPC',
        'ean'                        => 'EAN',
        'jan'                        => 'JAN',
        'isbn'                       => 'ISBN',
        'mpn'                        => 'MPN',
        'location'                   => 'Location',
        'tax_class'                  => 'Tax class',
        'substract_stock'            => 'Substract stock',
        'outofstock_status'          => 'Out Of Stock Status',
        'seo_keyword'                => 'Seo Keyword',
        'order'                      => 'Order',
        'dimensions'                 => 'Dimensions',
        'weight_class'               => 'Weight Class',
        'length_class'               => 'Length Class',
        'date_available'             => 'Date Available',
        'manufacturer'               => 'Manufacturer',
        'attributes'                 => 'Attribute',
        'discounts'                  => 'Discounts',
        'special'                    => 'Special Group',
        'images'                     => 'Images',
        'status'                     => 'Status',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'category'                   => 'Category',
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
