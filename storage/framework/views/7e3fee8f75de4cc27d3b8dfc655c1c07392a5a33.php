<header class="header">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 topbar-contact-info hidden-xs">
                                <ul class="rel-ls-none rel-ls-inline ">
                                    <li>
                                        <a href="mailto:<?php echo @Contact::get('email'); ?>">
                                            <span class="fa fa-envelope message-icon"></span>
                                            <?php echo @Contact::get('email'); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="callto:<?php echo @Contact::get('phone'); ?>">
                                            <span class="fa fa-phone"></span>
                                           <?php echo @Contact::get('phone'); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 top-right-menu">
                                <ul class="rel-ls-none rel-ls-inline">
                                    <li>
                                        <div class="search-field"><i class="fa fa-search"></i></div>
                                        <div class="search-box col-xs-12 col-sm-12">
                                            <form action="<?php echo e(trans_url('/products')); ?>" method="get">
                                                <input type="text" name="search[q]" placeholder="Search" class="form-control">                      
                                            </form>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user-circle"></span>My Account</a>
                                        <ul class="dropdown-menu">
                                         <?php if(user('client.web')): ?>
                                            <li><a href="<?php echo url('client'); ?>"><?php echo e(user('client.web')->name); ?></a></li>
                                         <?php else: ?>
                                            <li><a href="<?php echo url('client.web/login'); ?>">Login</a></li>
                                            <li><a href="<?php echo url('client.web/register'); ?>">Register</a></li>
                                         <?php endif; ?>                                        
                                            <li><a href="<?php echo url('client/product/product/favourite'); ?>">Wishlist</a></li>
                                            <li><a href="<?php echo url('carts'); ?>">My Cart</a></li>
                                            <li><a href="<?php echo url('orders/track'); ?>">Track my Order</a></li>
                                            <li><a href="<?php echo url('orders'); ?>">Checkout</a></li>
                                        <?php if(user('client.web')): ?>
                                            <li><a href="<?php echo e(URL::to('logout?role=client.web')); ?>">Logout</a></li>
                                        <?php else: ?>
                                        <?php endif; ?>
                                          </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="navbar yamm navbar-default">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo e(trans_url('/')); ?>"><img src="<?php echo e(trans_url('img/logo-white.png')); ?>" class="logo-white" alt=""><img src="<?php echo e(trans_url('img/logo.png')); ?>" class="logo-color" alt=""></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="<?php echo e(trans_url('/')); ?>">Home </a></li>
                                <li><a href="<?php echo e(trans_url('/products')); ?>" >Search</a></li>
                                <?php $__empty_1 = true; $__currentLoopData = Category::category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo @$value->name; ?></a>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <div class="yamm-content">
                                        <div class="row">
                                        <?php $__empty_2 = true; $__currentLoopData = $value['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $child): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_2 = false; ?> 
                                           <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                <h2 class="title"><?php echo @$child->name; ?></h2>

                                                <ul class="links">
                                                <?php $__empty_3 = true; $__currentLoopData = $child['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subchild): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_3 = false; ?>
                                                    <li><a href="<?php echo url('categories'); ?>/<?php echo @$subchild['slug']; ?>"><?php echo @$subchild->name; ?></a></li>
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_3): ?>
                                                <?php endif; ?>    
                                                </ul>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_2): ?>
                                        <?php endif; ?>
                                            
                                           <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                <img class="img-responsive" style="padding:10px; margin-left:380px;"  src="<?php echo url(@$value->defaultImage('lg','image')); ?>" alt="">
                                            </div>
                                        </div>
                                      </div>
                                    </li>
                                    </ul>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                                
                                <li><a href="<?php echo e(trans_url('about-us.html')); ?>">About Us</a></li>
                                <li><a href="<?php echo e(trans_url('blogs')); ?>">Blog</a></li>
                                <li><a href="<?php echo e(trans_url('contacts')); ?>">Contact</a></li>
                                <li class="top-cart-row">
                                    <?php echo $__env->make('cart::public.cart.latest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        </header>