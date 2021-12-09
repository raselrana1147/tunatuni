@extends('layouts.app')
@section('content')
   @include('front.files.slider')

   <div class="mb-4"></div>
   
   @include("front.files.banner")

   <div class="mb-3"></div><!-- End .mb-3 -->
   
    @include("front.files.deal_product")

   <div class="mb-3"></div><!-- End .mb-3 -->

 @include("front.files.category_product")

   <div class="mb-3"></div><!-- End .mb-3 -->

   @include("front.files.brand")
   @include("front.files.news_letter")
 @include('front.files.blog')
@endsection