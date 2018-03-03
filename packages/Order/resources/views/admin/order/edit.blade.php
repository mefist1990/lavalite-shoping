    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <!-- <li ><a href="#product" data-toggle="tab">Products</a></li> -->
            <!-- <li ><a href="#payment" data-toggle="tab">Payment Details</a></li>
            <li ><a href="#shipping" data-toggle="tab">Shipping Details</a></li> -->
            <!-- <li ><a href="#totals" data-toggle="tab">Totals</a></li> -->
            <li ><a href="#ordhistory"  data-toggle="tab">Order History</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#order-order-edit'  data-load-to='#order-order-entry' data-datatable='#order-order-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#order-order-entry' data-href='{{trans_url('admin/order/order')}}/{{$order->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/order/order/'. $order->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="order">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('order::order.name') !!} [{!!$order->name!!}] </div> -->
                @include('order::admin.order.partial.entry')
            <!-- </div> -->
        </div>
        {!!Form::close()!!}
    </div>

    <script type="text/javascript">
        $("#ordhistory").load("{{ trans_url('admin/order/order_history/list/') }}/{{Crypt::encrypt($order->id)}}");
    </script>