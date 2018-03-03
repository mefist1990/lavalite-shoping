    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
            <li ><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                @include('category::admin.category.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#category-category-entry' data-href='{{trans_url('admin/category/category/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($category->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#category-category-entry' data-href='{{ trans_url('/admin/category/category') }}/{{$category->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#category-category-entry' data-datatable='#category-category-list' data-href='{{ trans_url('/admin/category/category') }}/{{$category->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('category-category-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/category/category'))!!}
            <div class="tab-content clearfix disabled">
               <!--  <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('category::category.name') !!}  [{!! $category->name !!}] </div>
                <div class="tab-pane active" id="details"> -->
                    @include('category::admin.category.partial.entry')
                    <div class="tab-pane" id="images">
                         
                            <div class='col-md-12'><label>Images</label>
                           <div class='row disabled'>
                                  {!!$category->fileShow('image')!!}
                                   
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        {!! Form::close() !!}
    </div>