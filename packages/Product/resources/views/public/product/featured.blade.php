<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section_title">Featured products</h2>
                        <p>Summer Offer! Get Extra Discount Upto 20% For All Collection</p>
                    </div>
                </div>
                <div class="row">
                 @forelse($featured as $key => $product)
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product-item">
                            <div class="item-img">
                                <img src="{!!url(@$product->defaultImage('md','images'))!!}" class="img-responsive" alt="">
                            </div>
                            <!-- <div class="item-new">
                                <p>New</p>
                            </div> -->
                            <div class="item-links">
                                <!-- <a href="product-comparison.html" class="links-item"><i class="icon fa fa-random"></i></a> -->
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