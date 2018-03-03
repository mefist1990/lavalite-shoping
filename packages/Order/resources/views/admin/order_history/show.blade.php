    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('order::order_history.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('order::admin.order_history.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#order-order_history-entry' data-href='{{trans_url('admin/order/order_history/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button>
                @if($order_history->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#order-order_history-entry' data-href='{{ trans_url('/admin/order/order_history') }}/{{$order_history->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#order-order_history-entry' data-datatable='#order-order_history-list' data-href='{{ trans_url('/admin/order/order_history') }}/{{$order_history->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order_history-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/order/order_history'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('order::order_history.name') !!}  [{!! $order_history->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('order::admin.order_history.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>