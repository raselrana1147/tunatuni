@extends('layouts.app')
@section('title','TunaTuni | Cart View')

@section('content')
                <div class="page-header text-center" style="background-image: url('{{ asset('assets/frontend/assets/images/page-header-bg.jpg') }}')">
                    <div class="container">
                        <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                    </div><!-- End .container -->
                </div><!-- End .page-header -->
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="cart">
                        <div class="container">
                        @if (App\Models\Cart::total_item()>0)
                            
                        
                            <div class="row">
                                <div class="col-lg-9">
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($carts as $cart)

                                            <tr class="cart_row{{$cart->id}}">
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="#">{{$cart->product->name}}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">{{currency()}} {{$cart->product->current_price}}</td>
                                                <td class="price-col"> {{$cart->size->size_code}}</td>
                                                <td class="price-col">{{$cart->color->color_name}}  <span style="background: {{$cart->color->color_code}};color:{{$cart->color->color_code}}">color</span></td>
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity" cart_id="{{$cart->id}}" color_id="{{$cart->color_id}}" size_id="{{$cart->size_id}}" product_id="{{$cart->product_id}}"data-action="{{ route('cart.update') }}">
                                                        <input type="number" class="form-control update_cart{{$cart->id}}" value="{{$cart->quantity}}" min="1" step="1" data-decimals="0" required>
                                                    </div><!-- End .cart-product-quantity -->
                                                </td>
                                                <td class="total-col">{{currency()}} <span class="each_cart_price{{$cart->id}}">{{$cart->quantity*$cart->product->current_price}}</span></td>
                                                <td class="remove-col">
                                                    <button class="btn-remove"><i class="icon-close delete_cart" data-action="{{ route('cart.delete') }}" cart_id="{{$cart->id}}"></i></button>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->

                                </div><!-- End .col-lg-9 -->
                                <aside class="col-lg-3">
                                    <div class="summary summary-cart">
                                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                        <table class="table table-summary">
                                            <tbody>
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>{{currency()}} <span class="sub_total">{{$total_price}}</span></td>
                                                </tr><!-- End .summary-subtotal -->
                                                <tr class="summary-shipping">
                                                    <td>Shipping:</td>
                                                    <td>&nbsp;</td>
                                                </tr>

                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <label class="custom-control-label">Shipping Charge</label>
                                                       
                                                    </td>
                                                    <td>{{currency()}} {{shipping_charge()}}</td>
                                                </tr><!-- End .summary-shipping-row -->

                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <label class="custom-control-label">Tax</label>
                                                    </td>
                                                    <td>{{currency()}} {{tax()}}</td>
                                                </tr>
                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td>{{currency()}} <span class="grand_total">{{$total_price+tax()+shipping_charge()}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                    </div><!-- End .summary -->

                                    <a href="{{ route('front.index') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                                </aside><!-- End .col-lg-3 -->
                            </div><!-- End .row -->
                            @else 
                            <h6>You did not aaded any Itme inside the cart. Please </h6>
                            <a href="{{ route('front.index') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                            @endif


                        </div><!-- End .container -->
                    </div><!-- End .cart -->
                </div><!-- End .page-content -->
@endsection
@section('js')

<script>
	$(document).ready(function(){

	
          $('body').on('change','#available_quantity',function(e){
              
                 
          });     
	});
</script>
@endsection