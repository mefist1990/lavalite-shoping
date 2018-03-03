<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Order',
    'names'         => 'Orders',
    'title'       => [
        'user'  => 'My Orders',
        'admin' => 'Orders',
        'sub'   => [
            'user'  => 'Orders created by me',
            'admin' => 'Orders',
        ],
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'store_id'              => ['Default'=>'Default'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'invoice_no'                 => '< auto generated >',
        'invoice_prefix'             => 'Please enter invoice prefix',
        'store_id'                   => 'Please enter store',
        'store_name'                 => 'Please enter store name',
        'store_url'                  => 'Please enter store url',
        'customer_id'                => 'Please enter customer',
        'customer_group_id'          => 'Please enter customer group',
        'firstname'                  => 'Please enter first name',
        'lastname'                   => 'Please enter last name',
        'email'                      => 'Please enter email',
        'telephone'                  => 'Please enter telephone',
        'fax'                        => 'Please enter fax',
        'custom_field'               => 'Please enter custom_field',
        'payment_firstname'          => 'Please enter first name',
        'payment_lastname'           => 'Please enter last name',
        'payment_company'            => 'Please enter company',
        'payment_address_1'          => 'Please enter address 1',
        'payment_address_2'          => 'Please enter address 2',
        'payment_city'               => 'Please enter city',
        'payment_postcode'           => 'Please enter postcode',
        'payment_country'            => 'Please enter country',
        'payment_country_id'         => 'Please enter payment country',
        'payment_zone'               => 'Please enter zone',
        'payment_zone_id'            => 'Please enter zone',
        'payment_address_format'     => 'Please enter payment_address_format',
        'payment_custom_field'       => 'Please enter payment_custom_field',
        'payment_method'             => 'Please enter payment method',
        'payment_code'               => 'Please enter payment code',
        'shipping_firstname'         => 'Please enter first name',
        'shipping_lastname'          => 'Please enter last name',
        'shipping_company'           => 'Please enter company',
        'shipping_address_1'         => 'Please enter address 1',
        'shipping_address_2'         => 'Please enter address 2',
        'shipping_city'              => 'Please enter city',
        'shipping_postcode'          => 'Please enter postcode',
        'shipping_country'           => 'Please enter country',
        'shipping_country_id'        => 'Please enter country',
        'shipping_zone'              => 'Please enter zone',
        'shipping_zone_id'           => 'Please enter zone',
        'shipping_address_format'    => 'Please enter shipping_address_format',
        'shipping_custom_field'      => 'Please enter shipping_custom_field',
        'shipping_method'            => 'Please enter shipping method',
        'shipping_code'              => 'Please enter shipping code',
        'comment'                    => 'Please enter comment',
        'total'                      => 'Please enter total',
        'order_status_id'            => 'Please enter order status',
        'affiliate_id'               => 'Please enter affiliate',
        'commission'                 => 'Please enter commission',
        'marketing_id'               => 'Please enter marketing',
        'tracking'                   => 'Please enter tracking',
        'language_id'                => 'Please enter language',
        'currency_id'                => 'Please enter currency',
        'currency_code'              => 'Please enter currency code',
        'ip'                         => 'Please enter ip',
        'forwarded_ip'               => 'Please enter forwarded_ip',
        'user_agent'                 => 'Please enter user_agent',
        'accept_language'            => 'Please enter accept_language',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'invoice_no'                 => 'Invoice No',
        'invoice_prefix'             => 'Invoice Prefix',
        'store_id'                   => 'Store',
        'store_name'                 => 'Store Name',
        'store_url'                  => 'Store url',
        'customer_id'                => 'Customer',
        'customer_group_id'          => 'Customer Group',
        'firstname'                  => 'First Name',
        'lastname'                   => 'Last Name',
        'email'                      => 'Email',
        'telephone'                  => 'Telephone',
        'fax'                        => 'Fax',
        'custom_field'               => 'Custom field',
        'payment_firstname'          => 'First Name',
        'payment_lastname'           => 'Last Name',
        'payment_company'            => 'Company',
        'payment_address_1'          => 'Address 1',
        'payment_address_2'          => 'Address 2',
        'payment_city'               => 'City',
        'payment_postcode'           => 'Postcode',
        'payment_country'            => 'Country',
        'payment_country_id'         => 'Country',
        'payment_zone'               => 'Zone',
        'payment_zone_id'            => 'Zone',
        'payment_address_format'     => 'Payment address format',
        'payment_custom_field'       => 'Payment custom field',
        'payment_method'             => 'Payment Method',
        'payment_code'               => 'Payment Code',
        'shipping_firstname'         => 'First Name',
        'shipping_lastname'          => 'Last Name',
        'shipping_company'           => 'Company',
        'shipping_address_1'         => 'Address 1',
        'shipping_address_2'         => 'Address 2',
        'shipping_city'              => 'City',
        'shipping_postcode'          => 'Postcode',
        'shipping_country'           => 'Country',
        'shipping_country_id'        => 'Country',
        'shipping_zone'              => 'Zone',
        'shipping_zone_id'           => 'Zone',
        'shipping_address_format'    => 'Shipping address format',
        'shipping_custom_field'      => 'Shipping custom field',
        'shipping_method'            => 'Shipping Method',
        'shipping_code'              => 'Shipping Code',
        'comment'                    => 'Comment',
        'total'                      => 'Total',
        'order_status_id'            => 'Order Status',
        'affiliate_id'               => 'Affiliate',
        'commission'                 => 'Commission',
        'marketing_id'               => 'Marketing',
        'tracking'                   => 'Tracking',
        'language_id'                => 'Language',
        'currency_id'                => 'Currency',
        'currency_code'              => 'Currency Code',
        'ip'                         => 'Ip',
        'forwarded_ip'               => 'Forwarded ip',
        'user_agent'                 => 'User agent',
        'accept_language'            => 'Accept language',
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
