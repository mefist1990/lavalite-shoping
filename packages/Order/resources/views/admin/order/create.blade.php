    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <!-- <li ><a href="#product" data-toggle="tab">Products</a></li> -->
            <!-- <li ><a href="#payment" data-toggle="tab">Payment Details</a></li>
            <li ><a href="#shipping" data-toggle="tab">Shipping Details</a></li> -->
            <!-- <li ><a href="#totals" data-toggle="tab">Totals</a></li> -->
            <li class="disabled"><a href="#ordhistory">Order History</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#order-order-create'  data-load-to='#order-order-entry' data-datatable='#order-order-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#order-order-entry' data-href='{{trans_url('admin/order/order/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('order-order-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/order/order'))!!}
            <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('order::order.name') !!}] </div> -->
                @include('order::admin.order.partial.entry')
           <!--  </div> -->
           </div>
            {!! Form::close() !!}
        </div>
    </div>