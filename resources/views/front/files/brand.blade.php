
              <div class="container">
                <h2 class="title title-border mb-5">Shop by Brands</h2><!-- End .title -->
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

                    @php
                        $brands=DB::table('brands')->latest()->get();
                    @endphp
                    @foreach ($brands as $brand)
                    
                        <a href="{{ route('product.brand_wise_product',$brand->id) }}" class="brand">
                            <img src="{{ $brand->image !=null ? asset('assets/backend/image/brand/small/'.$brand->image) : asset('assets/backend/image/default.png') }}" alt="{{$brand->brand_name}}">
                        </a>
                     @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->