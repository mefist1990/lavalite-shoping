    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#cart" data-toggle="tab">{!! trans('cart::cart.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#cart-cart-edit'  data-load-to='#cart-cart-entry' data-datatable='#cart-cart-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#cart-cart-entry' data-href='{{trans_url('admin/cart/cart')}}/{{$cart->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('cart-cart-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/cart/cart/'. $cart->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="cart">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('cart::cart.name') !!} [{!!$cart->name!!}] </div>
                @include('cart::admin.cart.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>