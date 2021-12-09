
            <div class="container clothing ">
                <div class="heading heading-flex heading-border mb-3">
                    <div class="heading-left">
                        <h2 class="title">Our Exclusive Collections</h2><!-- End .title -->
                    </div><!-- End .heading-left -->
                </div>

                <div class="tab-content ">
                    <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                            <div class="row">
                                @foreach ($products as $product)
                                
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                   
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="{{ route('product.detail',$product->id) }}">
                                                <img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                              
                                               
                                                <a href="javascript:;" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$product->id}}"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <a href="{{ route('product.detail',$product->id) }}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$product->category->category_name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{ route('product.detail',$product->id) }}">{{$product->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ৳ {{$product->current_price}}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        
                                    </div><!-- End .product -->
                                    
                                </div>
                                 @endforeach

                            </div>
                             <div class="d-flex justify-content-center">
                                {{$products->onEachSide(1)->links()}}
                            </div>
                            

                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .container -->