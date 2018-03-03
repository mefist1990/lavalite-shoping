<section class="recent-listing featured-listing bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 sidebar">

                            
                           {!!Category::categoryAside()!!}
                        
                        
                        <div class="widget">
                            <h3>Price</h3>
                            <hr>
                            {!!Form::vertical_open()->method('GET')->id('filterprice')->action('products')!!}
                            <input type="hidden" name="search[id]" value="{!!$category->id!!}" >
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="number" name="search[price][min]" id="price-min" class="form-control chosen-select" required="required" placeholder="Min"/>
                                        
                                </div>
                                <div class="col-xs-6">
                                    <input type="number" name="search[price][max]" id="price-max" class="form-control chosen-select" required="required" placeholder="Max"/>
                                       
                                </div>
                            </div>
                              {!! Form::close()!!}
                        </div>
                         
                       
                        <div class="widget"><img src="{{trans_url('img/adv.jpg')}}" alt="" class="img-responsive center-block"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="shop-view-area">
                                    <div class="row">
                                    {!!Form::vertical_open()->method('GET')->id('filtersort')->action('products')!!}
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="shop-tab-pill">
                                                <div class="show-label">
                                                    {!! Form::select('sortBy')
                                                    -> options(['name' => 'Name', 'price' => 'Price'])
                                                    -> placeholder('Sort by')
                                                    -> addClass('chosen-select sort')
                                                    -> raw()!!}    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="shop-tab-pill">
                                                <div class="show-label">
                                                    {!! Form::select('sortOrder')
                                                    -> options(['ASC' => 'Ascending', 'DESC' => 'Descending'])
                                                    -> placeholder('Sort Order')
                                                    -> addClass('chosen-select sort')
                                                    -> raw()!!} 
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close()!!}
                                        <!-- <div class="col-md-4 col-sm-3 hidden-xs">
                                            <div class="shop-pagination text-center">
                                                
                                            </div>
                                        </div> -->
                                    {!!Form::vertical_open()->method('GET')->id('filtershow')->action('products')!!}
                                        <div class="col-md-4 col-sm-4 hidden-xs">
                                            <div class="shop-tab-pill show">
                                                <div class="show-label text-right">
                                                    <select class="form-control chosen-select" id="show" name="search[show]">
                                                        <option>Showing</option>
                                                        <option value="3">3</option>
                                                        <option value="6">6</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        @forelse($category['products'] as $key => $product) 
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="item-img">
                                        <img src="{!!url(@$product->defaultImage('md','images'))!!}" class="img-responsive" alt="">
                                    </div>
                                    <!-- <div class="item-new">
                                        <p>New</p>
                                    </div> -->
                                    <div class="item-links">
                                       <!--  <a href="product-comparison.html" class="links-item"><i class="icon fa fa-random"></i></a> -->
                                     <!--    <a href="#" class="links-item links-item-main">add to cart</a> -->
                                        <a href="{!!url('products')!!}/{!!@$product['slug']!!}" class="links-item"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a id="{!!$product->id!!}" class="add-cart links-item"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                        @if(user('client.web'))
                                        @if(!user('client.web')->product->contains($product->id))
                                        <a id="{!!$product->getRouteKey()!!}" class="fav-prop links-item"><i class="fa fa-heart-o"></i></a>
                                        @endif
                                        @else
                                        <a id="{!!$product->getRouteKey()!!}" class="fav-prop links-item"><i class="fa fa-heart-o"></i></a>
                                        @endif
                                    </div>
                                    <div class="item-sub">
                                        <a href="{!!url('products')!!}/{!!@$product['slug']!!}"><h5>{!!@$product->name!!}</h5></a>
                                        <p>${!!@$product->price!!}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endif
 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="shop-view-area">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-3 hidden-xs">
                                            <div class="shop-pagination text-center">
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            
        $("#price-max").keypress(function(event) {
            if (event.which == 13) {
            event.preventDefault();
            $("#filterprice").submit();
            }
           });

        $('.sort').on('change',function(){
            
            $('#filtersort').submit();
            });

        $('#show').on('change',function(){
            
            $('#filtershow').submit();
            });

        $('.fav-prop').on('click',function(){
            @if(user('client.web'))
                var id = $(this).attr('id');
                 $.ajax( {
                    url: "{{url('client/product/product/favourite')}}/"+ id,
                    type: 'POST',
                    success:function(data, textStatus, jqXHR)
                    {
                        setTimeout(function(){
                            window.location.reload(1);
                        }, 1000);                       
                        toastr.success('Product added to wishlist successfully.');
                    }
                 });
            @else
                $(location).attr('href', '{!!url("client")!!}');
            @endif
        });

        

        $(".add-cart").click(function(){
            var id = $(this).attr('id'); 
            $.ajax({
                  type: 'POST',
                  url: "{{ URL::to('carts/cart/add')}}",
                  data: "id="+id,
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

        <style type="text/css">
            .links-item{
                cursor: pointer;
            }
        </style>