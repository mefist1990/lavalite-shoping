<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('coupon::coupon.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('coupon::coupon.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/coupon/coupon'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/coupon/coupon/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('coupon::coupon.label.name')!!}</th>
                    <th>{!! trans('coupon::coupon.label.code')!!}</th>
                    <th>{!! trans('coupon::coupon.label.type')!!}</th>
                    <th>{!! trans('coupon::coupon.label.discount')!!}</th>
                    <th>{!! trans('coupon::coupon.label.start_date')!!}</th>
                    <th>{!! trans('coupon::coupon.label.end_date')!!}</th>
                    <th>{!! trans('coupon::coupon.label.status')!!}</th>
                    <th>{!! trans('coupon::coupon.label.status')!!}</th>
                    <th>{!! trans('coupon::coupon.label.created_at')!!}</th>
                    <th>{!! trans('coupon::coupon.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coupons as $coupon)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('coupon')}}/{{$coupon->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($coupon->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->discount }}</td>
                    <td>{{ $coupon->start_date }}</td>
                    <td>{{ $coupon->end_date }}</td>
                    <td>{{ $coupon->status }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('coupon')}}/{!!$coupon->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Coupon" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/coupon/coupon') !!}/{!! $coupon->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Coupon" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Coupon" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/coupon/coupon') !!}/{!! $coupon->getRouteKey() !!}" data-remove="{!! $coupon->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No coupons found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$coupons->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>