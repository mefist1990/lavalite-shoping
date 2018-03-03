<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section_title">Featured products</h2>
                        <p>Summer Offer! Get Extra Discount Upto 20% For All Collection</p>
                    </div>
                </div>
                <div class="row">
                 <?php $__empty_1 = true; $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product-item">
                            <div class="item-img">
                                <img src="<?php echo url(@$product->defaultImage('md','images')); ?>" class="img-responsive" alt="">
                            </div>
                            <!-- <div class="item-new">
                                <p>New</p>
                            </div> -->
                            <div class="item-links">
                                <!-- <a href="product-comparison.html" class="links-item"><i class="icon fa fa-random"></i></a> -->
                                <a href="<?php echo url('products'); ?>/<?php echo @$product['slug']; ?>" class="links-item"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a id="<?php echo $product->id; ?>" class="links-item links-item-main add-cart">add to cart</a>
                                <?php if(user('client.web')): ?>
                                <?php if(!user('client.web')->product->contains($product->id)): ?>
                                <a id="<?php echo $product->getRouteKey(); ?>" class="fav-prop links-item"><i class="fa fa-heart-o"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <a id="<?php echo $product->getRouteKey(); ?>" class="fav-prop links-item"><i class="fa fa-heart-o"></i></a>
                                <?php endif; ?>
                            </div>
                            <div class="item-sub">
                                <a href="<?php echo url('products'); ?>/<?php echo @$product['slug']; ?>"><h5><?php echo @$product->name; ?></h5></a>
                                <p>$<?php echo @$product->price; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                    
                </div> 
            </div>