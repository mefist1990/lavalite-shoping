    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#category-category-edit'  data-load-to='#category-category-entry' data-datatable='#category-category-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#category-category-entry' data-href='{{trans_url('admin/category/category')}}/{{$category->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('category-category-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/category/category/'. $category->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="category">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('category::category.name') !!} [{!!$category->name!!}] </div> -->
                @include('category::admin.category.partial.entry')
                <div class="tab-pane" id="images">
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class="form-group">
                                    <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('category::category.label.image') }}
                                    </label>
                                    <div class='col-lg-3 col-sm-12'>
                                        {!!$category->fileUpload('image')!!}
                                    </div>                                   
                                    <div class='col-lg-7 col-sm-12'>
                                        {!! $category->fileEdit('image')!!}
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