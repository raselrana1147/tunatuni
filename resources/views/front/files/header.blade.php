 <header class="header header-10 header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                            
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

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{ route('front.index') }}" class="logo">
                            <img src="{{ asset('assets/frontend/assets/images/demos/demo-13/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{ route('product.search') }}" method="post">
                                @csrf
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <div class="select-custom">
                                        <select name="category_id">
                                            <option value="">All Categories</option>
                                            @php
                                                $categories=App\Models\Admin\Category::latest()->get();
                                            @endphp
                                            @foreach ($categories as $category)    
                                               <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="keyword" placeholder="Search product ...">
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-random"></i>
                                    <span class="compare-txt">Compare</span>
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

                            <a href="{{ route('wishlist') }}" class="wishlist-link">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count total_wishlist">{{App\Models\Wishlist::total_wishlist()}}</span>
                                <span class="wishlist-txt">Wishlist</span>
                            </a>

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">{{App\Models\Cart::total_item()}}</span>
                                    <span class="cart-txt">Cart</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                         @if (App\Models\Cart::total_item()>0)

                                         @foreach (App\Models\Cart::carts() as $cart)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="{{ route('product.detail',$cart->product_id) }}">{{$cart->product->name}}</a>
                                                </h4>
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$cart->quantity}}</span>
                                                    x {{currency()}}{{$cart->product->current_price}}
                                                </span>
                                            </div><!-- End .product-cart-details -->
                                            <figure class="product-image-container">
                                                <a href="{{ route('product.detail',$cart->product_id) }}" class="product-image">
                                                    <img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </div><!-- End .product -->
                                         @endforeach
                                    </div><!-- End .cart-product -->
                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">{{currency()}} {{App\Models\Cart::total_price()}}</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ route('view.cart') }}" class="btn btn-primary">View Cart</a>
                                        <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .dropdown-cart-total -->
                                    @else
                                    <h4>Empty Cart</h4>

                                     @endif
                                </div><!-- End .dropdown-menu -->
                               

                            </div><!-- End .cart-dropdown -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                    @foreach ($categories as $category)
                                      {{--  sf-with-ul --}}
                                        <li class="megamenu-container">
                                    <a class="" href="{{ route('product.category_product',$category->id) }}">{{$category->category_name}}</a>
                                         @if (count($category->sub_categories)>0)
                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                @foreach ($category->sub_categories as $sub_cat)
                                                                <div class="col-md-6">
                                                                    <div class="menu-title"><a href="{{ route('product.subcategory_product',$sub_cat->id) }}">{{$sub_cat->sub_cat_name}}</a></div>
                                                                    @if (count($sub_cat->child_category)>0)
                                                                    <ul>
                                                                        @foreach ($sub_cat->child_category as $child_cat)
                                                                             <li><a href="{{ route('product.childcategory_product',$child_cat->id) }}">{{$child_cat->child_cat_name}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                 @endif
                                                                </div>
                                                                 @endforeach

                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                    <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="category.html" class="banner banner-menu">
                                                                <img src="{{ asset('assets/backend/image/category/small/'.$category->image)}}" alt="Banner">
                                                            </a>
                                                        </div><!-- End .banner banner-overlay -->
                                                    </div><!-- End .col-md-4 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .megamenu -->
                                             @endif
                                        </li>
                                       @endforeach
                                  
                                       
                                       
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .col-lg-3 -->
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="category.html">Shop</a>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                               
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .col-lg-9 -->
                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->