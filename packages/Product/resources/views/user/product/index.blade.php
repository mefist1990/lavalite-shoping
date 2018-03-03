<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('product::product.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('product::product.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/product/product'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/product/product/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>Thumb</th>
                                    <th>{!! trans('product::product.label.name')!!}</th>
                                    <th>{!! trans('product::product.label.model')!!}</th>
                                    <th>{!! trans('product::product.label.created_at')!!}</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('products')}}/{{$product->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($product->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->model }}</td>
                                    <td>{{ format_date($product->created_at) }}</td>


                                    <td class="td-actions">
                                        <a href="{{trans_url('products')}}/{{$product->getPublickey()}}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Product" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/product/product') !!}/{!! $product->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Product" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Product" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/product/product') !!}/{!! $product->getRouteKey() !!}" data-remove="{!! $product->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No products found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>