<section class="recent-listing single-product bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-detail-wraper">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="single-product-large-image">
                                <div class="tab-content">
                                @forelse($product->getImages('xl','images') as $key=> $image)
                                  <div role="tabpanel" class="tab-pane {{$key==0 ? 'active fade in' : 'fade' }}" id="single-img-{{$key}}">
                                  
                                   <div class="product-img" style="background-image: url({!!url(@$image)!!});"></div>
                                    
                                   </div>
                                   @empty
                                    @endif
                                </div>
                            </div>
                            <div class="single-product-small-image">
                                <ul class="sm-img-nav" role="tablist">
                                 @forelse($product->getImages('sm','images') as $key=> $image)
                                  <li role="presentation" class="{{$key==0 ? 'active': ''}}"><a href="#single-img-{{$key}}" aria-controls="single-img-{{$key}}" role="tab" data-toggle="tab">
                                    <div class="product-thumb" style="background-image: url({!!url(@$image)!!});"></div></a>
                                 </li>
                                @empty
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="detail-block">
                                <div class="product-detail-heading">
                                    <div class="detail-heading-left">
                                        <h3>{!!@$product->name!!}</h3>
                                        <?php
                                        if (Review::total($product->id) <> 0 && Review::count($product->id) <> 0) {
                                          $average = Review::total($product->id)/Review::count($product->id);
                                        }
                                       

                                         ?>
                                        <span class="rating"><span class="label-success label"> {!!@$average!!} <i class="fa fa-star"></i></span> {!!Review::total($product->id)!!} Ratings & {!!Review::count($product->id)!!} Reviews </span>
                                        <!-- <span class="rating"><span class="label-success label">{!!@$product->score!!} <i class="fa fa-star"></i></span> 12,375 Ratings & 1,646 Reviews</span> -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price text-primary">
                                                    <p>${!!@$product->price!!}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                            @if(user('client.web'))
                                            @if(!user('client.web')->product->contains($product->id))
                                                <div class="favorite-button" id="fav-btn">
                                                    <a  id="{!!$product->getRouteKey()!!}" class="fav-prop btn btn-primary btn-xs" data-toggle="tooltip" data-placement="left" title=""  data-original-title="Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    
                                                </div>
                                            @endif
                                            @else
                                                <div class="favorite-button">
                                                    <a  id="{!!$product->getRouteKey()!!}" class="fav-prop btn btn-primary btn-xs" data-toggle="tooltip" data-placement="left" title=""  data-original-title="Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="stock-container info-container mt10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span>Availability :</span>
                                            </div>  
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">{!!@$product->outofstock_status!!}</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{!!@$product->meta_description!!}</p>
                                    
                                </div>
                                
                                <div class="product-desc">
                                      @forelse(@$options as $key => $val)
                                      <div class="single-size clearfix">
                                        <div class="size-heading"><h5>{{@$key}}</h5></div>
                                        <div class="size-detail">
                                          <ul id="size" class="clearfix">
                                            @foreach($val as $key => $row)
                                            <li><a href="">{{@$row}}</a></li>
                                            @endforeach
                                          </ul>
                                        </div>
                                      </div>                                                                                         
                                      @empty
                                      @endif
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Qty</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" name="" id="qty" class="form-control" value="1" min="1" max="10" step="" required="required" title="">
                                            </div>
                                            <div class="col-sm-7">
                                                   <a id="{!!$product->id!!}" class="add-cart links-item btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-desc-block">
                    <div class="product-desc-tabs">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active description" id="description">
                            <p>{!!@$product->description!!}</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="review">
                            <div class="product-reviews">
                                <h4 class="title">Customer Reviews</h4>
                            </div>
                            <div class="product-review">
                            @forelse(Review::review($product->id) as $key => $review) 
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#">
                                      <img class="media-object" src="{!!url(@$review['user']->defaultImage('md','photo'))!!}" alt="user">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">{!!@$review->title!!}</h4>
                                    <span class="review-rating">
                                        @for($i=0; $i<5; $i++)
                                          <?php
                                            $score = ($i < $review->score)? 'fa fa-star' : 'fa fa-star-o';
                                          ?>
                                          <i class="{{@$score}}" aria-hidden="true"></i>
                                        @endfor
                                    </span>
                                    <p>{!!@$review->description!!}</p>
                                    <div class="media-footer">
                                        <p><span>{!!@$review['user']['name']!!},</span> {!!format_date(@$review->created_at)!!}</p>
                                    </div>
                                  </div>
                                </div> 
                                 @empty
                                 <p>No Reviews Available</p>
                                    @endif
                            </div>
                            <div class="product-reviews">
                                <h4 class="title">Write your review now</h4>
                                <hr>
                            </div>
                            {!!Form::vertical_open()
                             ->id('review-review-update')->action(URL::to('/client/review/review'))!!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!Form::text('title')
                                            ->id('input')
                                            ->required()
                                            ->placeholder("Title...")
                                            ->raw()!!}
                                        </div>
                                    </div>
                                </div>
                                {!!Form::hidden('product_id')->value($product->id)!!}
                                <div class="form-group">
                                    {!!Form::textarea('description')
                                            ->id('input')
                                            ->rows(3)
                                            ->placeholder("Write your review here...")
                                            ->raw()!!}
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="input-1" class="control-label">Rate This</label>
                                        
                                        <div class="wpc-star-rate"></div>
                                        </div>
                                    </div>
                                </div>
                               <button type="button" class="btn btn-primary add-review">Submit</button>
                            {!!Form::close()!!}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
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
                                               
                        toastr.success('Product added to wishlist successfully.');
                        $("#fav-btn").hide();
                    }
                 });
            @else
                $(location).attr('href', '{!!url("client")!!}');
            @endif
        });

        $(".add-cart").click(function(){
            var id = $(this).attr('id');
            var qty = $('#qty').val();
            $.ajax({
                  type: 'POST',
                  url: "{{ URL::to('carts/cart/add')}}",
                  data: {id:id,qty:qty},
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

        $(".add-review").click(function(){
          @if(user('client.web'))
            var form = $('#review-review-update');
            var formData = new FormData(); 
            params   = form.serializeArray();

            if( $('input[name="title"]').val() == null || $('input[name="title"]').val() == ''){
              toastr.error('Title field is required.');
              return false;
            }
            $.each(params, function(i, val) {
                 formData.append(val.name, val.value);
            }); 
            

          $.ajax( {
             url: "{{ URL::to('/client/review/review')}}",
             type: 'POST',
             data: formData,
             cache: false,
             processData: false,
             contentType: false,
             dataType: 'json',
             success:function(data, textStatus, jqXHR)
             {
              setTimeout(function(){
                  window.location.reload(1);
                  }, 1000);
                 toastr.success('Review submitted successfully.');
             }
         });
          @else
          $(location).attr('href', '{!!url("client")!!}');
          @endif
       });

       
           
        </script>