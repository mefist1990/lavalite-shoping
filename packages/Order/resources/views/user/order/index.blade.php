<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('order::order.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('order::order.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/order/order'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content table-responsive table-full-width">
                        @include('public::notifications')
                        <table class="table table-bigboy">
                            <thead>
                                <tr>
                                    <th>Ref. No</th>
                                    <th>Status</th>
                                    <th>No. of Products</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                    <th>Date Added</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>OR-{{ $order->id}}</td>
                                    <td>{{ @$order->status->name }}</td>
                                    <td>{!!$order->products->count()!!}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ format_date($order->created_at) }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('client/order/order')}}/{!!$order->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Order" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <!-- <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Order" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/order/order') !!}/{!! $order->getRouteKey() !!}" data-remove="{!! $order->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a> -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No orders found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>