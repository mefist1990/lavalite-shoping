    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Product</a></li>
            <li ><a href="#info" data-toggle="tab">Info</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
            <li ><a href="#tab-attribute" data-toggle="tab">Attributes</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                @include('product::admin.product.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#product-product-entry' data-href='{{trans_url('admin/product/product/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($product->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#product-product-entry' data-href='{{ trans_url('/admin/product/product') }}/{{$product->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#product-product-entry' data-datatable='#product-product-list' data-href='{{ trans_url('/admin/product/product') }}/{{$product->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('product-product-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/product/product'))!!}
            <div class="tab-content clearfix disabled">
                <!-- <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('product::product.name') !!}  [{!! $product->name !!}] </div>
                <div class="tab-pane active" id="details"> -->
                    @include('product::admin.product.partial.entry')
                    <div class="tab-pane" id="images">
                         
                            <div class='col-md-12'><label>Images</label>
                           <div class='row disabled'>
                                  {!!$product->fileShow('images')!!}
                                   
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        {!! Form::close() !!}
    </div>