  <div class="bg-light pt-3 pb-5">
                <div class="container">
                    <div class="heading heading-flex heading-border mb-3">
                       <div class="heading-right">
                            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab" role="tab" aria-controls="hot-all-tab" aria-selected="true">Featueard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="hot-elec-link" data-toggle="tab" href="#hot-elec-tab" role="tab" aria-controls="hot-elec-tab" aria-selected="false">Top sale</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="hot-furn-link" data-toggle="tab" href="#hot-furn-tab" role="tab" aria-controls="hot-furn-tab" aria-selected="false">Treanding</a>
                                </li>
                                
                                
                            </ul>
                       </div><!-- End .heading-right -->
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>
                               

                                @foreach ($features as $feature)
                                   
                                <div class="product">
                                    <figure class="product-media">
                                        
                                        <a href="{{ route('product.detail',$feature->id) }}">
                                            <img src="{{ asset('assets/backend/image/product/small/'.$feature->thumbnail)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">

                                          <a href="javascript:;" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$feature->id}}"><span>add to wishlist</span></a>
                                            
                                        </div>

                                        <div class="product-action">
                                            <a href="{{ route('product.detail',$feature->id) }}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="">{{$feature->category->category_name}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$feature->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{currency()}} {{$feature->current_price}}
                                        </div><!-- End .product-price -->
                                       
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                @endforeach


                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="hot-elec-tab" role="tabpanel" aria-labelledby="hot-elec-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>
                              
                                @foreach ($top_sales as $top)
                                   
                                <div class="product">
                                    <figure class="product-media">
                                       
                                        <a href="{{ route('product.detail',$top->id) }}">
                                            <img src="{{ asset('assets/backend/image/product/small/'.$top->thumbnail)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">

                                          <a href="javascript:;" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$top->id}}"><span>add to wishlist</span></a>
                                            
                                        </div>

                                        <div class="product-action">
                                            <a href="{{ route('product.detail',$top->id) }}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$top->category->category_name}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ route('product.detail',$top->id) }}">{{$top->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{currency()}} {{$top->current_price}}
                                        </div><!-- End .product-price -->
                                       
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                @endforeach

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="hot-furn-tab" role="tabpanel" aria-labelledby="hot-furn-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>
                              
                              @foreach ($trendings as $trending)
                                 
                              <div class="product">
                                  <figure class="product-media">
                                     
                                      <a href="{{ route('product.detail',$trending->id) }}">
                                          <img src="{{ asset('assets/backend/image/product/small/'.$trending->thumbnail)}}" alt="Product image" class="product-image">
                                      </a>

                                      <div class="product-action-vertical">

                                        <a href="javascript:;" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$trending->id}}"><span>add to wishlist</span></a>

                                      </div>

                                      <div class="product-action">
                                          <a href="{{ route('product.detail',$trending->id) }}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                      </div><!-- End .product-action -->
                                  </figure><!-- End .product-media -->

                                  <div class="product-body">
                                      <div class="product-cat">
                                          <a href="#">{{$trending->category->category_name}}</a>
                                      </div><!-- End .product-cat -->
                                      <h3 class="product-title"><a href="{{ route('product.detail',$trending->id) }}">{{$trending->name}}</a></h3><!-- End .product-title -->
                                      <div class="product-price">
                                          {{currency()}} {{$trending->current_price}}
                                      </div><!-- End .product-price -->
                                     
                                  </div><!-- End .product-body -->
                              </div><!-- End .product -->

                              @endforeach

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                      
                       
                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-5 -->