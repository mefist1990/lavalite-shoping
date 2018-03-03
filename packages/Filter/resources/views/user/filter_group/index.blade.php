<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('filter::filter_group.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('filter::filter_group.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/filter/filter_group'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/filter/filter_group/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('filter::filter_group.label.name')!!}</th>
                    <th>{!! trans('filter::filter_group.label.order')!!}</th>
                    <th>{!! trans('filter::filter_group.label.status')!!}</th>
                    <th>{!! trans('filter::filter_group.label.created_at')!!}</th>
                    <th>{!! trans('filter::filter_group.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($filter_groups as $filter_group)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('filter_group')}}/{{$filter_group->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($filter_group->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $filter_group->name }}</td>
                    <td>{{ $filter_group->order }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('filter_group')}}/{!!$filter_group->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View FilterGroup" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/filter/filter_group') !!}/{!! $filter_group->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit FilterGroup" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove FilterGroup" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/filter/filter_group') !!}/{!! $filter_group->getRouteKey() !!}" data-remove="{!! $filter_group->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No filter_groups found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$filter_groups->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>