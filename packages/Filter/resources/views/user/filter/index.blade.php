<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('filter::filter.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('filter::filter.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/filter/filter'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/filter/filter/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('filter::filter.label.name')!!}</th>
                    <th>{!! trans('filter::filter.label.order')!!}</th>
                    <th>{!! trans('filter::filter.label.filter_id')!!}</th>
                    <th>{!! trans('filter::filter.label.status')!!}</th>
                    <th>{!! trans('filter::filter.label.created_at')!!}</th>
                    <th>{!! trans('filter::filter.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($filters as $filter)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('filter')}}/{{$filter->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($filter->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $filter->name }}</td>
                    <td>{{ $filter->order }}</td>
                    <td>{{ $filter->filter_id }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('filter')}}/{!!$filter->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Filter" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/filter/filter') !!}/{!! $filter->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Filter" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Filter" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/filter/filter') !!}/{!! $filter->getRouteKey() !!}" data-remove="{!! $filter->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No filters found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$filters->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>