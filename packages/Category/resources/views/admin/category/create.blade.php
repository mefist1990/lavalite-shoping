    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#category-category-create'  data-load-to='#category-category-entry' data-datatable='#category-category-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#category-category-entry' data-href='{{trans_url('admin/category/category/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('category-category-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/category/category'))!!}
            <!-- <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('category::category.name') !!}] </div> -->
                <div class="tab-content clearfix">
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