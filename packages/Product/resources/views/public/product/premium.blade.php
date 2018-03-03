<div class="container">
    <div class="row"><div class="col-md-12"><h2 class="section_title">Hot Deals</h2></div></div>
    <div class="row" >
        <div class="col-md-12">
            <div class="trending" id="trending-slider">
                @forelse($premiums as $key => $product)
                <div class="item">                    
                    <div class="product-item">
                        <div class="item-img">
                            <img src="{!!url(@$product->defaultImage('md','images'))!!}" class="img-responsive" alt="">
                        </div>
                        <!-- <div class="item-new">
                            <p>New</p>
                        </div> -->
                        <div class="item-links">
                           <!--  <a href="product-comparison.html" class="links-item"><i class="icon fa fa-random"></i></a> -->
                          <!--   <a href="#" class="links-item links-item-main">add to cart</a> -->
                           <a href="{!!url('products')!!}/{!!@$product['slug']!!}" class="links-item"><i class="fa fa-eye" aria-hidden="true"></i></a>
                           <a id="{!!$product->id!!}" class="links-item links-item-main add-cart">add to cart</a>
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
        </div>
    </div>
</div>