    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <div class="box-tools pull-right">
                @include('order::admin.order_status.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#order-order_status-entry' data-href='{{trans_url('admin/order/order_status/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($order_status->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#order-order_status-entry' data-href='{{ trans_url('/admin/order/order_status') }}/{{$order_status->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#order-order_status-entry' data-datatable='#order-order_status-list' data-href='{{ trans_url('/admin/order/order_status') }}/{{$order_status->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order_status-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/order/order_status'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('order::order_status.name') !!}  [{!! $order_status->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('order::admin.order_status.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>