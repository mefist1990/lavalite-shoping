<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $order['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('orders') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="invoice_no">
                    {!! trans('order::order.label.invoice_no') !!}
                </label><br />
                    {!! $order['invoice_no'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="invoice_prefix">
                    {!! trans('order::order.label.invoice_prefix') !!}
                </label><br />
                    {!! $order['invoice_prefix'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="store_id">
                    {!! trans('order::order.label.store_id') !!}
                </label><br />
                    {!! $order['store_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="store_name">
                    {!! trans('order::order.label.store_name') !!}
                </label><br />
                    {!! $order['store_name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="store_url">
                    {!! trans('order::order.label.store_url') !!}
                </label><br />
                    {!! $order['store_url'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="customer_id">
                    {!! trans('order::order.label.customer_id') !!}
                </label><br />
                    {!! $order['customer_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="customer_group_id">
                    {!! trans('order::order.label.customer_group_id') !!}
                </label><br />
                    {!! $order['customer_group_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="firstname">
                    {!! trans('order::order.label.firstname') !!}
                </label><br />
                    {!! $order['firstname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="lastname">
                    {!! trans('order::order.label.lastname') !!}
                </label><br />
                    {!! $order['lastname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="email">
                    {!! trans('order::order.label.email') !!}
                </label><br />
                    {!! $order['email'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="telephone">
                    {!! trans('order::order.label.telephone') !!}
                </label><br />
                    {!! $order['telephone'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="fax">
                    {!! trans('order::order.label.fax') !!}
                </label><br />
                    {!! $order['fax'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="custom_field">
                    {!! trans('order::order.label.custom_field') !!}
                </label><br />
                    {!! $order['custom_field'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_firstname">
                    {!! trans('order::order.label.payment_firstname') !!}
                </label><br />
                    {!! $order['payment_firstname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_lastname">
                    {!! trans('order::order.label.payment_lastname') !!}
                </label><br />
                    {!! $order['payment_lastname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_company">
                    {!! trans('order::order.label.payment_company') !!}
                </label><br />
                    {!! $order['payment_company'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_address_1">
                    {!! trans('order::order.label.payment_address_1') !!}
                </label><br />
                    {!! $order['payment_address_1'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_address_2">
                    {!! trans('order::order.label.payment_address_2') !!}
                </label><br />
                    {!! $order['payment_address_2'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_city">
                    {!! trans('order::order.label.payment_city') !!}
                </label><br />
                    {!! $order['payment_city'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_postcode">
                    {!! trans('order::order.label.payment_postcode') !!}
                </label><br />
                    {!! $order['payment_postcode'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_country">
                    {!! trans('order::order.label.payment_country') !!}
                </label><br />
                    {!! $order['payment_country'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_country_id">
                    {!! trans('order::order.label.payment_country_id') !!}
                </label><br />
                    {!! $order['payment_country_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_zone">
                    {!! trans('order::order.label.payment_zone') !!}
                </label><br />
                    {!! $order['payment_zone'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_zone_id">
                    {!! trans('order::order.label.payment_zone_id') !!}
                </label><br />
                    {!! $order['payment_zone_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_address_format">
                    {!! trans('order::order.label.payment_address_format') !!}
                </label><br />
                    {!! $order['payment_address_format'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_custom_field">
                    {!! trans('order::order.label.payment_custom_field') !!}
                </label><br />
                    {!! $order['payment_custom_field'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_method">
                    {!! trans('order::order.label.payment_method') !!}
                </label><br />
                    {!! $order['payment_method'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="payment_code">
                    {!! trans('order::order.label.payment_code') !!}
                </label><br />
                    {!! $order['payment_code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_firstname">
                    {!! trans('order::order.label.shipping_firstname') !!}
                </label><br />
                    {!! $order['shipping_firstname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_lastname">
                    {!! trans('order::order.label.shipping_lastname') !!}
                </label><br />
                    {!! $order['shipping_lastname'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_company">
                    {!! trans('order::order.label.shipping_company') !!}
                </label><br />
                    {!! $order['shipping_company'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_address_1">
                    {!! trans('order::order.label.shipping_address_1') !!}
                </label><br />
                    {!! $order['shipping_address_1'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_address_2">
                    {!! trans('order::order.label.shipping_address_2') !!}
                </label><br />
                    {!! $order['shipping_address_2'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_city">
                    {!! trans('order::order.label.shipping_city') !!}
                </label><br />
                    {!! $order['shipping_city'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_postcode">
                    {!! trans('order::order.label.shipping_postcode') !!}
                </label><br />
                    {!! $order['shipping_postcode'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_country">
                    {!! trans('order::order.label.shipping_country') !!}
                </label><br />
                    {!! $order['shipping_country'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_country_id">
                    {!! trans('order::order.label.shipping_country_id') !!}
                </label><br />
                    {!! $order['shipping_country_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_zone">
                    {!! trans('order::order.label.shipping_zone') !!}
                </label><br />
                    {!! $order['shipping_zone'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_zone_id">
                    {!! trans('order::order.label.shipping_zone_id') !!}
                </label><br />
                    {!! $order['shipping_zone_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_address_format">
                    {!! trans('order::order.label.shipping_address_format') !!}
                </label><br />
                    {!! $order['shipping_address_format'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_custom_field">
                    {!! trans('order::order.label.shipping_custom_field') !!}
                </label><br />
                    {!! $order['shipping_custom_field'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_method">
                    {!! trans('order::order.label.shipping_method') !!}
                </label><br />
                    {!! $order['shipping_method'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping_code">
                    {!! trans('order::order.label.shipping_code') !!}
                </label><br />
                    {!! $order['shipping_code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="comment">
                    {!! trans('order::order.label.comment') !!}
                </label><br />
                    {!! $order['comment'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="total">
                    {!! trans('order::order.label.total') !!}
                </label><br />
                    {!! $order['total'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order_status_id">
                    {!! trans('order::order.label.order_status_id') !!}
                </label><br />
                    {!! $order['order_status_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="affiliate_id">
                    {!! trans('order::order.label.affiliate_id') !!}
                </label><br />
                    {!! $order['affiliate_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="commission">
                    {!! trans('order::order.label.commission') !!}
                </label><br />
                    {!! $order['commission'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="marketing_id">
                    {!! trans('order::order.label.marketing_id') !!}
                </label><br />
                    {!! $order['marketing_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="tracking">
                    {!! trans('order::order.label.tracking') !!}
                </label><br />
                    {!! $order['tracking'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="language_id">
                    {!! trans('order::order.label.language_id') !!}
                </label><br />
                    {!! $order['language_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="currency_id">
                    {!! trans('order::order.label.currency_id') !!}
                </label><br />
                    {!! $order['currency_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="currency_code">
                    {!! trans('order::order.label.currency_code') !!}
                </label><br />
                    {!! $order['currency_code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="ip">
                    {!! trans('order::order.label.ip') !!}
                </label><br />
                    {!! $order['ip'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="forwarded_ip">
                    {!! trans('order::order.label.forwarded_ip') !!}
                </label><br />
                    {!! $order['forwarded_ip'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_agent">
                    {!! trans('order::order.label.user_agent') !!}
                </label><br />
                    {!! $order['user_agent'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="accept_language">
                    {!! trans('order::order.label.accept_language') !!}
                </label><br />
                    {!! $order['accept_language'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('order::public.order.aside')
        </div>

    </div>
</div>