<section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="branding-slider" class="owl-carousel">
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand1.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand2.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand3.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand4.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand5.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand6.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand1.png')); ?>" alt="" />
                              </div>
                              <div>
                                <img src="<?php echo e(trans_url('img/brands/brand2.png')); ?>" alt="" />
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="subcribe">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <?php echo Form::open()->class('subscribe-form')->method('POST')->action('newsletters'); ?>

                            <a href=""><i class="fa fa-envelope"></i>signup newsletter</a>
                            <input type="email" name="email" placeholder="" class="form-control" required="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo Form::close(); ?>

                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <ul id="payment">
                                <li><a href="">
                                    <img src="<?php echo e(trans_url('img/payment/pay1.png')); ?>" alt="">
                                </a></li>
                                <li><a href="">
                                    <img src="<?php echo e(trans_url('img/payment/pay2.png')); ?>" alt="">
                                </a></li>
                                <li><a href="">
                                    <img src="<?php echo e(trans_url('img/payment/pay3.png')); ?>" alt="">
                                </a></li>
                                <li><a href="">
                                    <img src="<?php echo e(trans_url('img/payment/pay4.png')); ?>" alt="">
                                </a></li>
                                <li><a href="">
                                    <img src="<?php echo e(trans_url('img/payment/pay5.png')); ?>" alt="">
                                </a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
<footer>
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-3">
                        <h5>About us</h5>
                        <hr>
                        <p>You wanna be where you can see our troubles are all the same. You wanna be where everybody knows Your name. Here's the story of a their tropic island nest.</p>
                        <ul class="social_icons">
                            <li class="facebook"> <a target="new" href="http://facebook.com"><i class="fa fa-facebook"></i> </a></li>
                            <li class="twitter"> <a target="new" href="http://twitter.com"><i class="fa fa-twitter"></i> </a></li>
                            <li class="linkedin"> <a target="new" href="http://linkedin.com"><i class="fa fa-linkedin"></i> </a></li>
                            <li class="tumblr"> <a target="new" href="http://tumbler.com"><i class="fa fa-tumblr"></i> </a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3"> 
                        <h5>Quick Links</h5>
                        <hr>
                        <ul class="useful-links">
                            <li><a href="<?php echo e(trans_url('/')); ?>">Home</a></li>
                            <li><a href="<?php echo e(trans_url('/about-us.html')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(trans_url('/products')); ?>">Products</a></li>
                            <li><a href="<?php echo e(trans_url('/products')); ?>">Search</a></li>
                            <li><a href="<?php echo e(trans_url('/blogs')); ?>">Blog</a></li>
                            <li><a href="<?php echo e(trans_url('/contacts')); ?>">Contact</a></li> 
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h5>My Account</h5>
                        <hr>
                        <ul class="useful-links">
                            <?php if(user('client.web')): ?>
                                <li><a href="<?php echo url('client'); ?>"><?php echo e(ucFirst(user('client.web')->name)); ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo url('client.web/login'); ?>">Login</a></li>
                                <li><a href="<?php echo url('client.web/register'); ?>">Register</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo url('client/product/product/favourite'); ?>">Wishlist</a></li>
                            <li><a href="<?php echo url('carts'); ?>">My Cart</a></li>
                            <li><a href="<?php echo url('orders/track'); ?>">Track My Orders</a></li>
                            <li><a href="<?php echo url('orders'); ?>">Checkout</a></li>                              
                            <?php if(user('client.web')): ?>
                                <li><a href="<?php echo e(URL::to('logout?role=client.web')); ?>">Logout</a></li>
                            <?php else: ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3"> 
                        <h5>Contact</h5>
                        <hr>
                        <div class="loc-info">
                            <p><i class="fa fa-map-marker"></i> <?php echo @Contact::get('details'); ?></p>
                            <p><i class="fa fa-phone"></i> <?php echo @Contact::get('phone'); ?></p>
                            <p><i class="fa fa-print"></i> <?php echo @Contact::get('mobile'); ?></p>
                            <p><i class="fa fa-envelope-o"></i> <?php echo @Contact::get('email'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="rights">
            <div class="container">
            <?php echo trans('app.all.rights'); ?>

            </div>
        </div>
