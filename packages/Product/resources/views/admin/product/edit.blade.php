    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Product</a></li>
            <li ><a href="#info" data-toggle="tab">Info</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
             <li ><a href="#tab-attribute" data-toggle="tab">Attributes</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#product-product-edit'  data-load-to='#product-product-entry' data-datatable='#product-product-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#product-product-entry' data-href='{{trans_url('admin/product/product')}}/{{$product->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('product-product-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/product/product/'. $product->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="product">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('product::product.name') !!} [{!!$product->name!!}] </div> -->
                @include('product::admin.product.partial.entry')
                <div class="tab-pane" id="images">
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class="form-group">
                                    <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('product::product.label.images') }}
                                    </label>
                                    <div class='col-lg-3 col-sm-12'>
                                        {!!$product->fileUpload('images')!!}
                                    </div>                                   
                                    <div class='col-lg-7 col-sm-12'>
                                        {!! $product->fileEdit('images')!!}
                                    </div>
                                    {!!Form::hidden('upload_folder')!!}
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- </div> -->
        </div>
        {!!Form::close()!!}
    </div>