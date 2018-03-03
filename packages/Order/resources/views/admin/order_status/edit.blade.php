    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#order_status" data-toggle="tab">Details</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#order-order_status-edit'  data-load-to='#order-order_status-entry' data-datatable='#order-order_status-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#order-order_status-entry' data-href='{{trans_url('admin/order/order_status')}}/{{$order_status->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order_status-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/order/order_status/'. $order_status->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="order_status">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('order::order_status.name') !!} [{!!$order_status->name!!}] </div>
                @include('order::admin.order_status.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>