<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('order::order_status.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('order::order_status.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/order/order_status'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/order/order_status/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('order::order_status.label.name')!!}</th>
                    <th>{!! trans('order::order_status.label.status')!!}</th>
                    <th>{!! trans('order::order_status.label.created_at')!!}</th>
                    <th>{!! trans('order::order_status.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order_statuses as $order_status)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('order_status')}}/{{$order_status->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($order_status->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $order_status->name }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('order_status')}}/{!!$order_status->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View OrderStatus" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/order/order_status') !!}/{!! $order_status->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit OrderStatus" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove OrderStatus" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/order/order_status') !!}/{!! $order_status->getRouteKey() !!}" data-remove="{!! $order_status->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No order_statuses found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$order_statuses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>