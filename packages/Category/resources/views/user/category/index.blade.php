<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('category::category.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('category::category.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/category/category'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/category/category/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content table-responsive table-full-width">
                        @include('public::notifications')
                        <table class="table table-bigboy">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>{!! trans('category::category.label.parent_id')!!}</th>
                    <th>{!! trans('category::category.label.name')!!}</th>
                    <th>{!! trans('category::category.label.status')!!}</th>
                    <th>{!! trans('category::category.label.meta_title')!!}</th>
                    <th>{!! trans('category::category.label.meta_description')!!}</th>
                    <th>{!! trans('category::category.label.meta_keyword')!!}</th>
                    <th>{!! trans('category::category.label.image')!!}</th>
                    <th>{!! trans('category::category.label.top')!!}</th>
                    <th>{!! trans('category::category.label.order')!!}</th>
                    <th>{!! trans('category::category.label.status')!!}</th>
                    <th>{!! trans('category::category.label.created_at')!!}</th>
                    <th>{!! trans('category::category.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('category')}}/{{$category->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($category->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->meta_title }}</td>
                    <td>{{ $category->meta_description }}</td>
                    <td>{{ $category->meta_keyword }}</td>
                    <td>{{ $category->image }}</td>
                    <td>{{ $category->top }}</td>
                    <td>{{ $category->order }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('category')}}/{!!$category->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Category" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/category/category') !!}/{!! $category->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Category" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Category" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/category/category') !!}/{!! $category->getRouteKey() !!}" data-remove="{!! $category->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No categories found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>