        <div class="home-slider">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img data-src="img/slider/slide2.jpg" alt="First slide" src="img/slider/slide2.jpg">
                    </div>
                    <div class="item">
                        <img data-src="img/slider/slide3.jpg" alt="First slide" src="img/slider/slide3.jpg">
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="icon-prev"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="icon-next"></span></a>
        </div>
        


        <section class="premium-listing bg-grey">
              {!!Product::premium()!!}
        </section>

        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><img src="img/promo/sub-banner4.jpg" class="img-responsive banner-border" alt=""></div>
                    <div class="col-md-6"><img src="img/promo/sub-banner5.jpg" class="img-responsive banner-border" alt=""></div>
                </div>
            </div>
        </section>

        <section class="exclusive-area">

            <div class="container">

                <div class="row">
                    <!-- <img src="img/promo/x-m.jpg" class="img-responsive" alt=""> -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    
                        <div class="ex-left">
                            <div class="ex-left-text">
                                <h2>hausna</h2>
                                <h5>madE in men’s wear</h5>
                                <p>SEE OUR EXCLUSIVE COLLECTION</p>
                                
                                <a href="">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="ex-right">
                            <div class="ex-left-text ex-left-right">
                                <h6>EXPLORE OUR NEW COLLECTION</h6>
                                <h2>WE KNOW YOUR FIT</h2>
                                <p>GET THE EXTRA <span>50%</span> OFFER! TODAY ONLY</p>
                                
                                <a href="{{trans_url('/products')}}">view collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="recent-listing featured-listing bg-grey">
            {!!Product::featured()!!}
        </section>
        
        <section class="latest-news  bg-grey">
            <div class="container">
                <div class="row">
                    <h2 class="section_title">Latest Blogs</h2>
                    {!!Blog::latest('latest',4)!!}
                </div>
            </div>
        </section>
        

        <script type="text/javascript">
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