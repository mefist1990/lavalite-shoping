<header class="header">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 topbar-contact-info hidden-xs">
                                <ul class="rel-ls-none rel-ls-inline ">
                                    <li>
                                        <a href="mailto:{!!@Contact::get('email')!!}">
                                            <span class="fa fa-envelope message-icon"></span>
                                            {!!@Contact::get('email')!!}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="callto:{!!@Contact::get('phone')!!}">
                                            <span class="fa fa-phone"></span>
                                           {!!@Contact::get('phone')!!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 top-right-menu">
                                <ul class="rel-ls-none rel-ls-inline">
                                    <li>
                                        <div class="search-field"><i class="fa fa-search"></i></div>
                                        <div class="search-box col-xs-12 col-sm-12">
                                            <form action="{{trans_url('/products')}}" method="get">
                                                <input type="text" name="search[q]" placeholder="Search" class="form-control">                      
                                            </form>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user-circle"></span>My Account</a>
                                        <ul class="dropdown-menu">
                                         @if(user('client.web'))
                                            <li><a href="{!!url('client')!!}">{{user('client.web')->name}}</a></li>
                                         @else
                                            <li><a href="{!!url('client.web/login')!!}">Login</a></li>
                                            <li><a href="{!!url('client.web/register')!!}">Register</a></li>
                                         @endif                                        
                                            <li><a href="{!!url('client/product/product/favourite')!!}">Wishlist</a></li>
                                            <li><a href="{!!url('carts')!!}">My Cart</a></li>
                                            <li><a href="{!!url('orders/track')!!}">Track my Order</a></li>
                                            <li><a href="{!!url('orders')!!}">Checkout</a></li>
                                        @if(user('client.web'))
                                            <li><a href="{{ URL::to('logout?role=client.web') }}">Logout</a></li>
                                        @else
                                        @endif
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
                            <a class="navbar-brand" href="{{trans_url('/')}}"><img src="{{trans_url('img/logo-white.png')}}" class="logo-white" alt=""><img src="{{trans_url('img/logo.png')}}" class="logo-color" alt=""></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="{{trans_url('/')}}">Home </a></li>
                                <li><a href="{{trans_url('/products')}}" >Search</a></li>
                                @forelse(Category::category() as $key=> $value)
                                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">{!!@$value->name!!}</a>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <div class="yamm-content">
                                        <div class="row">
                                        @forelse($value['child'] as $key=> $child) 
                                           <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                <h2 class="title">{!!@$child->name!!}</h2>

                                                <ul class="links">
                                                @forelse($child['child'] as $key=>$subchild)
                                                    <li><a href="{!!url('categories')!!}/{!!@$subchild['slug']!!}">{!!@$subchild->name!!}</a></li>
                                                    
                                                @empty
                                                @endif    
                                                </ul>
                                            </div>
                                        @empty
                                        @endif
                                            
                                           <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                <img class="img-responsive" style="padding:10px; margin-left:380px;"  src="{!!url(@$value->defaultImage('lg','image'))!!}" alt="">
                                            </div>
                                        </div>
                                      </div>
                                    </li>
                                    </ul>
                                </li>
                                @empty
                                @endif
                                
                                <li><a href="{{trans_url('about-us.html')}}">About Us</a></li>
                                <li><a href="{{trans_url('blogs')}}">Blog</a></li>
                                <li><a href="{{trans_url('contacts')}}">Contact</a></li>
                                <li class="top-cart-row">
                                    @include('cart::public.cart.latest')
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        </header>