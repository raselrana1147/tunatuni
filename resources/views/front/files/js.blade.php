 <script src="{{ asset('assets/frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/superfish.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.countdown.min.js')}}"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('assets/frontend/assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/demos/demo-13.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/toast.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/cart.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/wishlist.js')}}"></script>
    {{-- <script src="{{ asset('assets/backend/style/js/sweet-alert.js')}}"></script> --}}

     <script>
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
      </script>

        <script>
            @if(Session::has('message'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                  case 'info':
                       toastr.info("{{ Session::get('message') }}");
                       break;
                  case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
                  case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                  case 'error':
                      toastr.error("{{ Session::get('message') }}");
                     break;
              }
            @endif
      </script>
    @yield('js')