@extends('layouts.app')
@section('title','TunaTuni | Wishlist View')

@section('content')
                <div class="page-header text-center" style="background-image: url('{{ asset('assets/frontend/assets/images/page-header-bg.jpg') }}')">
                    <div class="container">
                        <h1 class="page-title">Wishlist</h1>
                    </div><!-- End .container -->
                </div><!-- End .page-header -->
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="cart">
                        <div class="container">
                        @if (count($wishlists)>0)
                            <div class="row">
                                <div class="col-lg-9">
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                
                                                <th>Price</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($wishlists as $wishlist)

                                            <tr class="wishlist_row{{$wishlist->id}}">
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset('assets/backend/image/product/small/'.$wishlist->product->thumbnail) }}" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="#">{{$wishlist->product->name}}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">{{currency()}} {{$wishlist->product->current_price}}</td>
                                                <td class="remove-col">
                                                    <a href="{{ route('product.detail',$wishlist->product_id) }}" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</a>

                                                    <button class="btn-remove"><i class="icon-close delete_wishlist" data-action="{{ route('wishlist.delete') }}" wishlist_id="{{$wishlist->id}}"></i></button>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->

                                </div><!-- End .col-lg-9 -->
                                
                            </div><!-- End .row -->
                            @else 
                            <h6>No Item found </h6>
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