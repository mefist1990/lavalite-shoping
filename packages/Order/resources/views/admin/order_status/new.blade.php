<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('order::order_status.names') !!} [{!! trans('order::order_status.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#order-order_status-entry' data-href='{!!trans_url('admin/order/order_status/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>