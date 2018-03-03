    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#order-order_status-create'  data-load-to='#order-order_status-entry' data-datatable='#order-order_status-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#order-order_status-entry' data-href='{{trans_url('admin/order/order_status/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('order-order_status-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/order/order_status'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('order::order_status.name') !!}] </div>
                @include('order::admin.order_status.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>