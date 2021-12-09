 <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                           
                            <p>Call: +0123 456 789</p>
                        </div>

                       
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                  
                                    <li><a href="{{ route('wishlist') }}"><i class="icon-heart-o"></i>Wishlist (<span class="total_wishlist">{{App\Models\Wishlist::total_wishlist()}}</span>)</a></li>
                                     @guest
                                     <li class="login">
                                         <a href="{{ route('login') }}">Sign in / Sign up</a>
                                     </li>
                                      @else
                                       <li class="login">
                                          <a href="javascript:;" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                          </form>
                                       </li>  
                                    @endguest
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ route('front.index') }}" class="logo">
                            <img src="{{ asset('assets/frontend/assets/images/demos/demo-13/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{ route('front.index') }}">Home</a>
                                </li>
                                <li><a href="category.html">Shop</a></li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                <i class="icon-random"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="compare-products">
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                    </li>
                                </ul>

                                <div class="compare-actions">
                                    <a href="#" class="action-link">Clear All</a>
                                    <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{App\Models\Cart::total_item()}}</span>
                            </a>

                           <div class="dropdown-menu dropdown-menu-right cart-item-added">
                             @if (App\Models\Cart::total_item()>0)

                                @foreach (App\Models\Cart::carts() as $cart)
                               <div class="dropdown-cart-products">
                                   <div class="product">
                                       <div class="product-cart-details">
                                           <h4 class="product-title">
                                               <a href="{{ route('product.detail',$cart->product_id) }}">{{$cart->product->name}}</a>
                                           </h4>
                                           <span class="cart-product-info">
                                               <span class="cart-product-qty">{{$cart->quantity}}</span>
                                               x {{currency()}}{{$cart->product->current_price}}
                                           </span>
                                       </div>
                                       <figure class="product-image-container">
                                           <a href="{{ route('product.detail',$cart->product_id) }}" class="product-image">
                                               <img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" alt="product">
                                           </a>
                                       </figure>
                                       <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                   </div>
                               </div>
                                @endforeach
                               <div class="dropdown-cart-total">
                                   <span>Total</span>

                                   <span class="cart-total-price">{{currency()}} {{App\Models\Cart::total_price()}}</span>
                               </div>

                               <div class="dropdown-cart-action">
                                   <a href="{{ route('view.cart') }}" class="btn btn-primary">View Cart</a>
                                   <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                               </div>
                               @else
                               <h4>Empty Cart</h4>

                                @endif
                           </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
