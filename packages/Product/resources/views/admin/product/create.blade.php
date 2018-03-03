    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Product</a></li>
            <li ><a href="#info" data-toggle="tab">Info</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
            <li ><a href="#tab-attribute" data-toggle="tab">Attributes</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#product-product-create'  data-load-to='#product-product-entry' data-datatable='#product-product-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#product-product-entry' data-href='{{trans_url('admin/product/product/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('product-product-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/product/product'))!!}
            <!-- <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('product::product.name') !!}] </div> -->
                <div class="tab-content clearfix">
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

                                    {!!Form::hidden('upload_folder')!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            {!! Form::close() !!}
        </div>
    </div>