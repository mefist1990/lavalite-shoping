<?php

namespace Laracart\Order\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class OrderListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Order\Models\Order $order)
    {
        return [
            'id'                => $order->getRouteKey(),
            'invoice_no'        => $order->invoice_no,
            'invoice_prefix'    => $order->invoice_prefix,
            'store_id'          => $order->store_id,
            'store_name'        => $order->store_name,
            'store_url'         => $order->store_url,
            'customer_id'       => $order->customer_id,
            'user_id'           => $order->client->name,
            'customer_group_id' => $order->customer_group_id,
            'firstname'         => $order->firstname,
            'lastname'          => $order->lastname,
            'email'             => $order->email,
            'telephone'         => $order->telephone,
            'fax'               => $order->fax,
            'custom_field'      => $order->custom_field,
            'payment_firstname' => $order->payment_firstname,
            'payment_lastname'  => $order->payment_lastname,
            // 'payment_company'   => $order->payment_company,
            'payment_address' => $order->payment_address,
            'payment_city'      => $order->payment_city,
            'payment_postcode'  => $order->payment_postcode,
            // 'payment_country'   => $order->payment_country,
            // 'payment_country_id' => $order->payment_country_id,
            // 'payment_zone'      => $order->payment_zone,
            // 'payment_zone_id'   => $order->payment_zone_id,
            // 'payment_address_format' => $order->payment_address_format,
            'payment_method'    => $order->payment_method,
            'payment_code'      => $order->payment_code,
            'shipping_firstname' => $order->shipping_firstname,
            'shipping_lastname' => $order->shipping_lastname,
            // 'shipping_company'  => $order->shipping_company,
            // 'shipping_address' => $order->shipping_address_1,
            // 'shipping_city'     => $order->shipping_city,
            // 'shipping_postcode' => $order->shipping_postcode,
            // 'shipping_country'  => $order->shipping_country,
            // 'shipping_country_id' => $order->shipping_country_id,
            // 'shipping_zone'     => $order->shipping_zone,
            'shipping_zone_id'  => $order->shipping_zone_id,
            'shipping_address_format' => $order->shipping_address_format,
            'shipping_custom_field' => $order->shipping_custom_field,
            'shipping_method'   => $order->shipping_method,
            'shipping_code'     => $order->shipping_code,
            'comment'           => $order->comment,
            'total'             => $order->total,
            'order_status_id'   => @$order->status->name,
            'affiliate_id'      => $order->affiliate_id,
            'commission'        => $order->commission,
            'marketing_id'      => $order->marketing_id,
            'tracking'          => $order->tracking,
            'language_id'       => $order->language_id,
            'currency_id'       => $order->currency_id,
            'currency_code'     => $order->currency_code,
            'ip'                => $order->ip,
            'forwarded_ip'      => $order->forwarded_ip,
            'user_agent'        => $order->user_agent,
            'accept_language'   => $order->accept_language,
            'status'            => trans('app.'.$order->status),
            'created_at'        => format_date($order->created_at),
            'updated_at'        => format_date($order->updated_at),
        ];
    }
}