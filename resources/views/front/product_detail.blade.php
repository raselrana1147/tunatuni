@extends('layouts.app')
@section('css')
	<link rel="stylesheet" href="{{asset('assets/frontend/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" class="set_img" src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" data-zoom-image="{{ asset('assets/backend/image/product/large/'.$product->thumbnail) }}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                        	@foreach ($product->galleries as $gallery)

                                            <a class="product-gallery-item get_src active" href="#" data-image="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" data-zoom-image="{{ asset('assets/backend/image/gallery/large/'.$gallery->image) }}">

                                                <img src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" alt="product side">
                                            </a>
                                            @endforeach
                                           
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{currency()}} {{$product->current_price}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{$product->title}}</p>
                                    </div><!-- End .product-content -->
                                    <form id="submit_cart_form" data-action="{{ route('add_to_cart') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="details-filter-row details-row-size">
                                        <label>Sizes:</label>

                                        <div class="product-nav product-nav-thumbs">
                                            <div class="select-custom">
                                                <select name="size_id" id="find_color" class="form-control" data-action="{{ route('find_color') }}">
                                                    <option value="">Select size</option>
                                                    @foreach ($stocks as $stock)
                                                        
                                                        <option value="{{$stock->size_id}}">{{$stock->size->size_code}}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="color">Colors:</label>
                                        <div class="select-custom">
                                            <select  name="color_id" id="available_quantity" data-action="{{ route('available_quantity') }}" class="form-control load_color">
                                                <option value="">Select Color</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->

                                   <div class="details-filter-row details-row-size">
                                       <label for="quantity">Quantity:</label>
                                       <div class="select-custom">
                                           <select name="quantity" class="form-control load_quantity">
                                           </select>
                                       </div><!-- End .select-custom -->
                                   </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        @if (count($stock_check)>0)
                                           <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                           @else
                                          <button class="btn btn-sm btn-danger">Stock out</button>
                                        @endif
                                        

                                        <div class="details-action-wrapper">

                                         <a href="javascript:;" class="btn-product btn-wishlist add_to_wishlist" title="Wishlist" data-action="{{ route('add_to_wishlist')}}" product_id="{{$product->id}}"><span>Add to Wishlist</span></a>

                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->
                                    </form>
                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category: {{$product->category->category_name}}</span>
                                           
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>{!!$product->description!!} </p>
                                    
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                     <p>{!!$product->specification!!} </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                     <p>{!!$product->return_policy!!} </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">Releted Product</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                      
                        @foreach ($releted_products as $related)
                            {{-- expr --}}
                     
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                
                                <a href="{{ route('product.detail',$related->id) }}">
                                    <img src="{{ asset('assets/backend/image/product/small/'.$related->thumbnail) }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{$related->category->category_name}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">{{$related->name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="out-price">{{currency(). $related->current_price}}</span>
                                </div><!-- End .product-price -->
                                
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                           @endforeach
                        
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
@endsection
@section('js')
<script src="{{asset('assets/frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/superfish.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/jquery.elevateZoom.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.product-gallery-item').on("click",function(){
		 var image=$(this).attr('data-zoom-image')
		  $("#product-zoom").attr("src",image)
		  $("#product-zoom").attr("data-zoom-image",image)
		})


     $('body').on('change','#find_color',function(e){
                e.preventDefault();
                  let size_id=$(this).val();
                  let product_id="{{$product->id}}";
                  $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data:{size_id:size_id,product_id:product_id},

                  success:function(response){
                    
                    var setItem='';
                    response.colors.forEach(function(item,index){
                       // console.log(item.name)
                        setItem+='<option value="">Select Color</option><option value="'+item.color.id+'">'+item.color.color_name+'</option>'
                    });
                    $('.load_color').html(setItem);
                     
                  },

                  error:function(response){
                  }
                });
          });

          $('body').on('change','#available_quantity',function(e){
                e.preventDefault();
                  let size_id=$("#find_color").val();
                  let color_id=$(this).val();

                  let product_id="{{$product->id}}";
                 
                if (size_id ==="" || color_id ==="") 
                {
                     $('.load_quantity').html('<option value="">Select Quantity</option>'); 
                }else
                {
                      $.ajax({
                      url: $(this).attr('data-action'),
                      method: "POST",
                      data:{color_id:color_id,size_id:size_id,product_id:product_id},

                      success:function(response){
                        
                        var setItem='';
                       console.log(response.quantity.quantity);
                       for (var i = 1; i <=response.quantity.quantity; i++) {
                            setItem+='<option value="'+i+'">'+i+'</option>'
                       }  
                        $('.load_quantity').html(setItem); 
                      },

                      error:function(response){
                      }
                    });
                    
                }   
          });     
	});
</script>
@endsection