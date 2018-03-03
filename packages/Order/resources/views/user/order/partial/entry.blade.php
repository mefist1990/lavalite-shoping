<div class='col-md-4 col-sm-6'>
                     {!! Form::text('invoice_no')
                     -> label(trans('order::order.label.invoice_no'))
                     -> placeholder(trans('order::order.placeholder.invoice_no'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('store_id')
                    -> options(trans('order::order.options.store_id'))
                    -> label(trans('order::order.label.store_id'))
                    -> placeholder(trans('order::order.placeholder.store_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('store_name')
                     -> label(trans('order::order.label.store_name'))
                     -> placeholder(trans('order::order.placeholder.store_name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('store_url')
                     -> label(trans('order::order.label.store_url'))
                     -> placeholder(trans('order::order.placeholder.store_url'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('customer_id')
                    -> options(trans('order::order.options.customer_id'))
                    -> label(trans('order::order.label.customer_id'))
                    -> placeholder(trans('order::order.placeholder.customer_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('customer_group_id')
                    -> options(trans('order::order.options.customer_group_id'))
                    -> label(trans('order::order.label.customer_group_id'))
                    -> placeholder(trans('order::order.placeholder.customer_group_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('firstname')
                     -> label(trans('order::order.label.firstname'))
                     -> placeholder(trans('order::order.placeholder.firstname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('lastname')
                     -> label(trans('order::order.label.lastname'))
                     -> placeholder(trans('order::order.placeholder.lastname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('email')
                     -> label(trans('order::order.label.email'))
                     -> placeholder(trans('order::order.placeholder.email'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::numeric('telephone')
                     -> label(trans('order::order.label.telephone'))
                     -> placeholder(trans('order::order.placeholder.telephone'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('fax')
                     -> label(trans('order::order.label.fax'))
                     -> placeholder(trans('order::order.placeholder.fax'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_firstname')
                       -> label(trans('order::order.label.payment_firstname'))
                       -> placeholder(trans('order::order.placeholder.payment_firstname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_lastname')
                       -> label(trans('order::order.label.payment_lastname'))
                       -> placeholder(trans('order::order.placeholder.payment_lastname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_company')
                       -> label(trans('order::order.label.payment_company'))
                       -> placeholder(trans('order::order.placeholder.payment_company'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_address_1')
                       -> label(trans('order::order.label.payment_address_1'))
                       -> placeholder(trans('order::order.placeholder.payment_address_1'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_address_2')
                       -> label(trans('order::order.label.payment_address_2'))
                       -> placeholder(trans('order::order.placeholder.payment_address_2'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_city')
                       -> label(trans('order::order.label.payment_city'))
                       -> placeholder(trans('order::order.placeholder.payment_city'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_postcode')
                       -> label(trans('order::order.label.payment_postcode'))
                       -> placeholder(trans('order::order.placeholder.payment_postcode'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_country')
                       -> label(trans('order::order.label.payment_country'))
                       -> placeholder(trans('order::order.placeholder.payment_country'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('payment_country_id')
                    -> options(trans('order::order.options.payment_country_id'))
                    -> label(trans('order::order.label.payment_country_id'))
                    -> placeholder(trans('order::order.placeholder.payment_country_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_zone')
                       -> label(trans('order::order.label.payment_zone'))
                       -> placeholder(trans('order::order.placeholder.payment_zone'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('payment_zone_id')
                    -> options(trans('order::order.options.payment_zone_id'))
                    -> label(trans('order::order.label.payment_zone_id'))
                    -> placeholder(trans('order::order.placeholder.payment_zone_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('payment_method')
                    -> options(trans('order::order.options.payment_method'))
                    -> label(trans('order::order.label.payment_method'))
                    -> placeholder(trans('order::order.placeholder.payment_method'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('payment_code')
                       -> label(trans('order::order.label.payment_code'))
                       -> placeholder(trans('order::order.placeholder.payment_code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_firstname')
                       -> label(trans('order::order.label.shipping_firstname'))
                       -> placeholder(trans('order::order.placeholder.shipping_firstname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_lastname')
                       -> label(trans('order::order.label.shipping_lastname'))
                       -> placeholder(trans('order::order.placeholder.shipping_lastname'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_company')
                       -> label(trans('order::order.label.shipping_company'))
                       -> placeholder(trans('order::order.placeholder.shipping_company'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_address_1')
                       -> label(trans('order::order.label.shipping_address_1'))
                       -> placeholder(trans('order::order.placeholder.shipping_address_1'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_address_2')
                       -> label(trans('order::order.label.shipping_address_2'))
                       -> placeholder(trans('order::order.placeholder.shipping_address_2'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_city')
                       -> label(trans('order::order.label.shipping_city'))
                       -> placeholder(trans('order::order.placeholder.shipping_city'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_postcode')
                       -> label(trans('order::order.label.shipping_postcode'))
                       -> placeholder(trans('order::order.placeholder.shipping_postcode'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_country')
                       -> label(trans('order::order.label.shipping_country'))
                       -> placeholder(trans('order::order.placeholder.shipping_country'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('shipping_country_id')
                    -> options(trans('order::order.options.shipping_country_id'))
                    -> label(trans('order::order.label.shipping_country_id'))
                    -> placeholder(trans('order::order.placeholder.shipping_country_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_zone')
                       -> label(trans('order::order.label.shipping_zone'))
                       -> placeholder(trans('order::order.placeholder.shipping_zone'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('shipping_zone_id')
                    -> options(trans('order::order.options.shipping_zone_id'))
                    -> label(trans('order::order.label.shipping_zone_id'))
                    -> placeholder(trans('order::order.placeholder.shipping_zone_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_method')
                       -> label(trans('order::order.label.shipping_method'))
                       -> placeholder(trans('order::order.placeholder.shipping_method'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('shipping_code')
                       -> label(trans('order::order.label.shipping_code'))
                       -> placeholder(trans('order::order.placeholder.shipping_code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('comment')
                    -> label(trans('order::order.label.comment'))
                    -> placeholder(trans('order::order.placeholder.comment'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('total')
                       -> label(trans('order::order.label.total'))
                       -> placeholder(trans('order::order.placeholder.total'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('order_status_id')
                    -> options(trans('order::order.options.order_status_id'))
                    -> label(trans('order::order.label.order_status_id'))
                    -> placeholder(trans('order::order.placeholder.order_status_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('affiliate_id')
                       -> label(trans('order::order.label.affiliate_id'))
                       -> placeholder(trans('order::order.placeholder.affiliate_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('commission')
                       -> label(trans('order::order.label.commission'))
                       -> placeholder(trans('order::order.placeholder.commission'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('marketing_id')
                       -> label(trans('order::order.label.marketing_id'))
                       -> placeholder(trans('order::order.placeholder.marketing_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tracking')
                       -> label(trans('order::order.label.tracking'))
                       -> placeholder(trans('order::order.placeholder.tracking'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('language_id')
                       -> label(trans('order::order.label.language_id'))
                       -> placeholder(trans('order::order.placeholder.language_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('currency_id')
                       -> label(trans('order::order.label.currency_id'))
                       -> placeholder(trans('order::order.placeholder.currency_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('currency_code')
                       -> label(trans('order::order.label.currency_code'))
                       -> placeholder(trans('order::order.placeholder.currency_code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('ip')
                       -> label(trans('order::order.label.ip'))
                       -> placeholder(trans('order::order.placeholder.ip'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('forwarded_ip')
                       -> label(trans('order::order.label.forwarded_ip'))
                       -> placeholder(trans('order::order.placeholder.forwarded_ip'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('user_agent')
                       -> label(trans('order::order.label.user_agent'))
                       -> placeholder(trans('order::order.placeholder.user_agent'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}