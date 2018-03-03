<div class="dropdown dropdown-cart">
    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
        <div class="items-cart-inner">
        <div class="basket">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="basket-item-count"><span class="count"><?php echo Cart::count(); ?></span></div>
            <div class="total-price-basket">
                <span class="lbl">cart </span>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu">
        <li class="cart-list">
            <div class="cart-area">

                <?php $__empty_1 = true; $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?> 
                    <?php $product=Product::productDetails($row->id)?>
                    <div class="cart-item product-summary mt10 mr10">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="image">
                                    <a href="<?php echo url('products'); ?>/<?php echo @$product->slug; ?>"><img src="<?php echo url(@$product->defaultImage('sm','images')); ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="<?php echo url('products'); ?>/<?php echo @$product->slug; ?>"><?php echo e($row->name); ?> (<?php echo e($row->qty); ?>)</a></h3>
                                <div class="price">$<?php echo e($row->price); ?></div>
                            </div>
                            <div class="col-xs-1 action">
                                <a href="#" ><i id="del-<?php echo $row->rowId; ?>" class="fa fa-trash remove-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <p>No Items Added</p>
                <?php endif; ?>
                
            </div>
            <hr>
            <div class="clearfix cart-total">
                <div class="pull-right">
                        <span class="text">Sub Total :</span><span class='price'>$<?php echo e(Cart::subtotal()); ?></span>
                </div>
                <div class="clearfix"></div>
                    
                <a href="<?php echo url('orders'); ?>" class="btn btn-upper btn-primary btn-block mt20">Checkout</a>
                <div class="clearfix"></div>
                <div class="text-center mt10">
                    <a href="<?php echo url('carts'); ?>" > View Cart</a> 
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
                      url: "<?php echo e(URL::to('carts/cart/delete')); ?>",
                      data: "id="+id,
                      dataType: 'html',
                      success:function(data, textStatus, jqXHR)
                      {  
                            $(".top-cart-row").load('<?php echo e(url("carts/cart/latest")); ?>');
                            toastr.success('Product deleted successfully.');
                      }
                      
                  });       
            });
</script>