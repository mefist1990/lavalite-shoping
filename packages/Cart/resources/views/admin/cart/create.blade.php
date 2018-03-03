    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Cart</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#cart-cart-create'  data-load-to='#cart-cart-entry' data-datatable='#cart-cart-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#cart-cart-entry' data-href='{{trans_url('admin/cart/cart/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('cart-cart-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/cart/cart'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('cart::cart.name') !!}] </div>
                @include('cart::admin.cart.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>