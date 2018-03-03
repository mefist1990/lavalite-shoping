<section class="bg-grey cart">
            <div class="container">
                <div class="row ">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                             {!!Form::vertical_open()
                                    ->id('cart-cart-update')
                                    !!}
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Remove</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Subtotal</th>
                                            <th class="cart-total last-item">Grandtotal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <a href="{!!url('/')!!}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                        
                                                        <a id="update-cart" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                                        <a id="clear-cart" class="btn btn-upper btn-primary pull-right mr10 outer-right-xs" ">Clear shopping cart</a>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>

                                    @forelse(Cart::content() as $key=>$row) 
                                    <?php $product=Product::productDetails($row->id)?>
                                        <tr id="{{$row->rowId}}">
                                            <td class="romove-item"><a title="cancel" class="btn btn-danger btn-xs remove-cart"><i class="fa fa-trash-o "></i></a></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="{!!url('products')!!}/{!!@$product->slug!!}">
                                                    <img src="{!!url(@$product->defaultImage('xs','images'))!!}" class="img-responsive" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a href="{!!url('products')!!}/{!!@$product->slug!!}">{{$row->name}}</a></h4>
                                                <!-- <div class="cart-product-info">
                                                        <span class="product-color">Color:<span>Blue</span></span>
                                                </div> -->
                                            </td>
                                           
                                            <td class="cart-product-quantity">
                                                <div class="col-md-10 quant-input">
                                                        <input type="number" name="qty[{{$key}}]" value="{{$row->qty}}" id="qty{{$row->rowId}}" min="1" class="form-control">
                                                         
                                                  </div>
                                                  <div class="col-md-2"><a><i style="zoom:2;" class="fa fa-refresh edit-cart" aria-hidden="true"></i></a></div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price">${{$row->price}} USD</span></td>
                                            <td class="cart-product-grand-total"><span class="cart-grand-total-price">${{$row->total}} USD</span></td>
                                        </tr>
                                    @empty
                                    @endif
                                        
                                    </tbody>
                                   
                                </table>
                                  {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Estimate shipping and tax</span>
                                            <p>Enter your destination to get shipping and tax.</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class="info-title control-label">Country <span>*</span></label>
                                                    <select class="form-control unicase-form-control chosen-select">
                                                        <option>--Select options--</option>
                                                        <option>India</option>
                                                        <option>SriLanka</option>
                                                        <option>united kingdom</option>
                                                        <option>saudi arabia</option>
                                                        <option>united arab emirates</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title control-label">State/Province <span>*</span></label>
                                                    <select class="form-control unicase-form-control chosen-select">
                                                        <option>--Select options--</option>
                                                        <option>TamilNadu</option>
                                                        <option>Kerala</option>
                                                        <option>Andhra Pradesh</option>
                                                        <option>Karnataka</option>
                                                        <option>Madhya Pradesh</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title control-label">Zip/Postal Code</label>
                                                    <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                                                </div>
                                                <div class="pull-right">
                                                    <button type="submit" class="btn-upper btn btn-primary">Get a Quote</button>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="coupon" id="add-coupon" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" id="apply-coupon" class="btn-upper btn btn-primary">Apply Coupon</button>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-4 col-sm-12 cart-shopping-total">
                        {!!Form::vertical_open()
                        ->id('order-coupon-add')
                        ->method('GET')
                        ->action(URL::to('/orders')) !!}
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">
                                                Total<span class="inner-left-md">${{Cart::total()}} USD</span>
                                            </div>
                                            <div class="cart-grand-total text-primary">
                                                Grand Total<span class="inner-left-md" id="coupon-subtotal">${{Cart::subtotal()}} USD</span>
                                            </div>
                                        </th>
                                         <input type="hidden" name="coupon"/>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                                    <button type="submit" class="btn btn-success">Proceed to Checkout</button>
                                                    <span class="">Checkout with multiples address!</span>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                </tbody>
                            </table>
                             {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            
        $(".remove-cart").click(function(){
            var id = $(this).closest('tr').prop('id'); 
            $.ajax({
          type: 'POST',
          url: "{{ URL::to('carts/cart/delete')}}",
          data: "id="+id,
          dataType: 'html',
          success:function(data, textStatus, jqXHR)
          {  
             
             setTimeout(function(){
                window.location.reload(1);
                }, 1000);
             toastr.success('Product deleted successfully.');
          },
          error: function(jqXHR, textStatus, errorThrown)
          {

          }
          
      });
        });

        $(".edit-cart").click(function(){
            var id = $(this).closest('tr').prop('id'); 
            var qty=$('#qty'+id).val();
            $.ajax({
          type: 'POST',
          url: "{{ URL::to('carts/cart/edit')}}",
          data: "id="+id + "&qty="+qty,
          dataType: 'html',
          success:function(data, textStatus, jqXHR)
          {  
             
             setTimeout(function(){
                window.location.reload(1);
                }, 1000);
             toastr.success('Product updated successfully.');
          },
          error: function(jqXHR, textStatus, errorThrown)
          {

          }
          
      });
        });

        $("#clear-cart").click(function(){
              if (!confirm("Do you want to clear the cart!")) {
               return false;
              }
             
             var form = $('#cart-cart-update');
             var formData = new FormData();
             params   = form.serializeArray();

             $.each(params, function(i, val) {
                    formData.append(val.name, val.value);
                });
    
           $.ajax( {
            url: '{{ URL::to('carts/cart/clear')}}',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function(data, textStatus, jqXHR)
            {
                toastr.success('Cart cleared successfully.');
                setTimeout(function(){
                window.location.reload(1);
                }, 1000);
            }
        });
        });

        $("#update-cart").click(function(){
             var form = $('#cart-cart-update');
             var formData = new FormData();
             params   = form.serializeArray();

           $.ajax( {
            url: '{{ URL::to('carts/cart/update')}}',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function(data, textStatus, jqXHR)
            {
                toastr.success('Cart updated successfully.');
            }
        });
        });

         $("#apply-coupon").click(function(){
            var coupons=$('#add-coupon').val(); 
            $.ajax({
          type: 'POST',
          url: "{{ URL::to('coupons/coupon/check')}}",
          data: "coupon="+coupons, 
          dataType: 'html',            
          success:function(data, textStatus, jqXHR)
          {  

              if (data != 0) {
               $("#coupon-subtotal").html('$'+data);
               $('input[name="coupon"]').val(coupons);
               toastr.success('Your coupon discount has been applied!');
              }
              else{
                 toastr.error('Coupon is either invalid, expired or reached its usage limit!', 'Error');
              }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {

          }
          
      });
        });
        </script>