    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#order_history" data-toggle="tab">{!! trans('order::order_history.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#order-order_history-edit'  data-load-to='#order-order_history-entry' data-datatable='#order-order_history-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#order-order_history-entry' data-href='{{trans_url('admin/order/order_history')}}/{{$order_history->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order_history-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/order/order_history/'. $order_history->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="order_history">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('order::order_history.name') !!} [{!!$order_history->name!!}] </div>
                @include('order::admin.order_history.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>