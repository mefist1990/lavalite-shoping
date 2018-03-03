    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#blog" data-toggle="tab">{!! trans('blog::blog.tab.name') !!}</a></li>
            <li class=""><a href="#images" data-toggle="tab">  Images</a></li>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#blog-blog-edit'  data-load-to='#blog-blog-entry' data-datatable='#blog-blog-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#blog-blog-entry' data-href='{{trans_url('admin/blog/blog')}}/{{$blog->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('blog-blog-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/blog/blog/'. $blog->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="blog">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('blog::blog.name') !!} [{!!$blog->title!!}] </div>
                @include('blog::admin.blog.partial.entry')
            </div>
        
              <div class="tab-pane " id="images">
                <div class='col-md-12'>
                        <label>Images</label>                        
                    <div class="clearfix"> 
                         {!!$blog->fileUpload('images')!!}
                         {!!$blog->fileEdit('images')!!}
                   </div>
                </div> 
             </div>
        </div>
        {!!Form::close()!!}
    </div>