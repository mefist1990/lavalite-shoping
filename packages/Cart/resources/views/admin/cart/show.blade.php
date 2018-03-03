    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('cart::cart.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('cart::admin.cart.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#cart-cart-entry' data-href='{{trans_url('admin/cart/cart/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button>
                @if($cart->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#cart-cart-entry' data-href='{{ trans_url('/admin/cart/cart') }}/{{$cart->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#cart-cart-entry' data-datatable='#cart-cart-list' data-href='{{ trans_url('/admin/cart/cart') }}/{{$cart->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('cart-cart-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/cart/cart'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('cart::cart.name') !!}  [{!! $cart->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('cart::admin.cart.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>