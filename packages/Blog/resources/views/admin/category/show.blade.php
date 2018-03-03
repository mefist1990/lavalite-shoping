    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('blog::category.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('blog::admin.category.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#blog-category-entry' data-href='{{trans_url('admin/blog/category/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($category->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#blog-category-entry' data-href='{{ trans_url('/admin/blog/category') }}/{{$category->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#blog-category-entry' data-datatable='#blog-category-list' data-href='{{ trans_url('/admin/blog/category') }}/{{$category->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('blog-category-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/blog/category'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('blog::category.name') !!}  [{!! $category->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('blog::admin.category.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>