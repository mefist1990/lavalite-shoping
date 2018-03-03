<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('returns::returns.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('returns::returns.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/returns/returns'))!!}
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
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Order ID</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($returns as $returns)
                                <tr>
                                    <td>RE-{{ $returns->id}}</td>
                                    <td>{{ @$returns->product }}</td>
                                    <td>{{ @$returns->status }}</td>
                                    <td>{{ format_date($returns->created_at) }}</td>
                                    <td>OR-{{ $returns->order_id}}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('client/returns/returns')}}/{!!$returns->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Order" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No returns found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>