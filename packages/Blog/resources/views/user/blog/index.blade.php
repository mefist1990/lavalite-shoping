<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('blog::blog.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('blog::blog.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/blog/blog'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/blog/blog/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th class="">Image</th>
                                    <th>{!! trans('blog::blog.label.category_id')!!}</th>
                    <th>{!! trans('blog::blog.label.title')!!}</th>
                    <th>{!! trans('blog::blog.label.viewcount')!!}</th>
                    <th>{!! trans('blog::blog.label.status')!!}</th>
                    <th>{!! trans('blog::blog.label.posted_on')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                <tr>
                                        <td>
                                            <div class="img-container">
                                                <a href="{{trans_url('blogs')}}/{{$blog->getPublickey()}}">
                                                  <img alt="" class="img-responsive" src="{!!url($blog->defaultImage('sm','images'))!!}">
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $blog->category['name'] }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->viewcount }}</td>
                                        <td>{{ $blog->status }}</td>
                                        <td>{{ $blog->posted_on }}</td>
                                        <td class="td-actions">
                                            <a href="{{trans_url('blog')}}/{!!$blog->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Blog" class="btn btn-info btn-simple">
                                                <i class="material-icons">panorama</i>
                                            </a>
                                            <a href="{!! trans_url(get_guard('url').'/blog/blog') !!}/{!! $blog->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Blog" class="btn btn-success btn-simple">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Blog" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/blog/blog') !!}/{!! $blog->getRouteKey() !!}" data-remove="{!! $blog->getRouteKey() !!}">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No blogs found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{@$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>