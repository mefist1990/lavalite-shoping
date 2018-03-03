<div class="dropdown dropdown-cart">
    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
        <div class="items-cart-inner">
        <div class="basket">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="basket-item-count"><span class="count">{!!Cart::count()!!}</span></div>
            <div class="total-price-basket">
                <span class="lbl">cart </span>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu">
        <li class="cart-list">
            <div class="cart-area">

                @forelse(Cart::content() as $key=>$row) 
                    <?php $product=Product::productDetails($row->id)?>
                    <div class="cart-item product-summary mt10 mr10">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="image">
                                    <a href="{!!url('products')!!}/{!!@$product->slug!!}"><img src="{!!url(@$product->defaultImage('sm','images'))!!}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="{!!url('products')!!}/{!!@$product->slug!!}">{{$row->name}} ({{$row->qty}})</a></h3>
                                <div class="price">${{$row->price}}</div>
                            </div>
                            <div class="col-xs-1 action">
                                <a href="#" ><i id="del-{!!$row->rowId!!}" class="fa fa-trash remove-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @empty
                <p>No Items Added</p>
                @endif
                
            </div>
            <hr>
            <div class="clearfix cart-total">
                <div class="pull-right">
                        <span class="text">Sub Total :</span><span class='price'>${{Cart::subtotal()}}</span>
                </div>
                <div class="clearfix"></div>
                    
                <a href="{!!url('orders')!!}" class="btn btn-upper btn-primary btn-block mt20">Checkout</a>
                <div class="clearfix"></div>
                <div class="text-center mt10">
                    <a href="{!!url('carts')!!}" > View Cart</a> 
                </div>
            </div>
        </li>
    </ul>
</div>  

<style type="text/css">
    .cart-area{
        max-height: 160px;
        overflow: hidden;
        overflow-y: auto;
    }
</style>

<script type="text/javascript">
            $(".remove-cart").click(function(){
                    var str = $(this).prop('id');
                    var res = str.split("-");
                    var id = res[1];
                    $.ajax({
                      type: 'POST',
                      url: "{{ URL::to('carts/cart/delete')}}",
                      data: "id="+id,
                      dataType: 'html',
                      success:function(data, textStatus, jqXHR)
                      {  
                            $(".top-cart-row").load('{{url("carts/cart/latest")}}');
                            toastr.success('Product deleted successfully.');
                      }
                      
                  });       
            });
</script>