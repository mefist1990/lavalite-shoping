<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('cart::cart.names') !!} [{!! trans('cart::cart.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#cart-cart-entry' data-href='{!!trans_url('admin/cart/cart/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>