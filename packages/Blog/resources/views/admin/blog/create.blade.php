    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#info" data-toggle="tab">Blog</a></li>
            <li class=""><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#blog-blog-create'  data-load-to='#blog-blog-entry' data-datatable='#blog-blog-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#blog-blog-entry' data-href='{{trans_url('admin/blog/blog/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
       
            {!!Form::vertical_open()
            ->id('blog-blog-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/blog/blog'))!!}
             <div class="tab-content clearfix">
                <div class="tab-pane active" id="info">
                    <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('blog::blog.name') !!}] </div>
                    <div class='row disabled'>
                        @include('blog::admin.blog.partial.entry')                   
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class='row disabled'>
                        <div class='col-md-12'>
                                <label>Images</label>                        
                            <div class="clearfix"> 
                                 {!!$blog->fileUpload('images')!!}
                           </div>
                        </div> 
                    </div>
                 </div>
              </div>
            {!! Form::close() !!}
       
    </div>