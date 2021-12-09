<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
   @include("front.files.css")
   <style>
       .toast-message{
               
                font-size: 13px
        }
   </style>
</head>

<body>
    <div class="page-wrapper">
        @if (Route::is('front.index'))
            @include("front.files.header")
        @else
          @include("front.files.main_header")
        @endif
        <main class="main">
            @section('content')
            @show
        </main><!-- End .main -->

        @include("front.files.footer")
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

  @include("front.files.mobile_menu")

    <!-- Sign in / Register Modal -->
   
    {{--  @include("front.files.popup")
 --}}
    <!-- Plugins JS File -->
    @include("front.files.js")
</body>


<!-- Mirrored from portotheme.com/html/molla/index-13.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 09:53:24 GMT -->
</html>