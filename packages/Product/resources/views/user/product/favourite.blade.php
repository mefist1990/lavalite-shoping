<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">Wish List</h4>
                                <p class="sub-title">Wish list products of me</p>
                            </div>
                           <!--  <div class="col-sm-4">
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
                                </div>
                            </div> -->
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
                                    <th>{!! trans('product::product.label.price')!!}</th>   
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
                                    <td>{{ $product->model}}</td>
                                    <td>{{ number_format($product->price,2) }}</td>


                                    <td class="td-actions">

                                        <a href="{{trans_url('products')}}/{{$product->getPublickey()}}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Product" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>  
                                        <a href="#" title="Remove Product" class="btn btn-danger btn-simple">
                                            <i class="remove-fav material-icons" id="{!!$product->getRouteKey()!!}">close</i>
                                        </a> 

                                        <a title="Add to cart" id="{!!$product->id!!}" class="add-cart btn btn-success btn-simple">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
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

<script type="text/javascript">
    $('.remove-fav').off().on('click',function(){
            
                var token=$("#fav-form input[name=_token]").val();
                var id=$(this).attr('id');
                var formData=new FormData();  
                formData.append('_token',token);    
                var url="{{url('client/product/product/removefav')}}/"+id;
                 $.ajax( {
                    url: url,
                    data:formData,
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        setTimeout(function(){
                            window.location.reload(1);
                        }, 1000);                       
                        toastr.success('Product removed from wishlist successfully.');
                    }
                 });
           
        })

    $(".add-cart").click(function(){
            var id = $(this).attr('id');
            $.ajax({
                  type: 'POST',
                  url: "{{ URL::to('carts/cart/add')}}",
                  data: {id:id},
                  dataType: 'html',
                  success:function(data, textStatus, jqXHR)
                  {  
                     $(".top-cart-row").load('{{url("carts/cart/latest")}}');
                     toastr.success('Product added to cart successfully.');
                  },
                  error: function(jqXHR, textStatus, errorThrown)
                  {

                  }
          
            });

        });
</script>