    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">OrderHistory</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#order-order_history-create'  data-load-to='#order-order_history-entry' data-datatable='#order-order_history-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#order-order_history-entry' data-href='{{trans_url('admin/order/order_history/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('order-order_history-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/order/order_history'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('order::order_history.name') !!}] </div>
                @include('order::admin.order_history.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>