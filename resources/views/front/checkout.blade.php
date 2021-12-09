@extends('layouts.app')
@section('title','TunaTuni | Cart View')

@section('content')
                <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                    <div class="container">
                        <h1 class="page-title">Checkout<span>Shop</span></h1>
                    </div><!-- End .container -->
                </div><!-- End .page-header -->
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="checkout">
                        <div class="container">
                            <div class="checkout-discount">
                                <form action="{{ route('submit.checkout') }}" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" required id="checkout-discount-input">
                                    <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                                </form>
                            </div><!-- End .checkout-discount -->
                            <form action="{{ route('submit.checkout') }}" method="post">
                                @csrf;
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Name *</label>
                                                    <input type="text" name="name" class="form-control" required value="{{Auth::user()->name}}">
                                                </div><!-- End .col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <label>Email *</label>
                                                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Phone *</label>
                                                    <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Address *</label>
                                            <textarea class="form-control" name="address" cols="30" rows="4" placeholder="Address">{{Auth::user()->address}}</textarea>

                                            <label>Order notes (optional)</label>
                                            <textarea name="order_note" class="form-control" cols="30" rows="2" placeholder="Notes about your order, special notes for delivery"></textarea>
                                    </div><!-- End .col-lg-9 -->
                                    <aside class="col-lg-3">
                                        <div class="summary">
                                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                            <table class="table table-summary">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($carts as $cart)
                                                    <tr>
                                                        <td><a href="{{ route('product.detail',$cart->product_id) }}">{{$cart->product->name}}</a></td>
                                                        <td>{{currency()}}{{$cart->quantity*$cart->product->current_price}}</td>
                                                    </tr>

                                                   @endforeach
                                                    <tr>
                                                        <td>Total:</td>
                                                        <td>{{currency()}}{{$total_price}}</td>

                                                    </tr><!-- End .summary-total -->
                                                    <tr>
                                                        <td>Tax:</td>
                                                        <td>{{currency()}}{{tax()}}</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Tax:</td>
                                                        <td>{{currency()}}{{shipping_charge()}}</td>
                                                    </tr>
                                                    <tr class="summary-total">
                                                        <td>Grand Total:</td>
                                                        <td>{{currency()}}{{shipping_charge()+tax()+$total_price}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <div class="accordion-summary" id="accordion-payment">
                                                    @foreach ($payments as $payment)
                                                        <div class="form-check">
                                                               <input class="form-check-input select_payment" type="radio" name="payment_id" value="{{$payment->id}}" value="option1" {{($payment->account_number==NULL) ? 'checked' : ''}} account_number="{{$payment->account_number}}">
                                                               <label class="form-check-label ml-3">
                                                                    {{$payment->payment_name}}
                                                               </label>
                                                             </div>
                                                     @endforeach

                                                     <div id="payment_area" style="display: none">
                                                         <div class="col-lg-12 mb-20">
                                                             <div class="checkout-form-list">
                                                                <label>
                                                                     Account Number
                                                                    <span id="account_number"></span>
                                                                </label> <br>
                                                                 <label>Transaction number <span class="required">*</span></label><br>
                                                                 <input type="text" class="form-control" name="transaction_number" id="transaction_number" />
                                                             </div>
                                                         </div>
                                                     </div>

                                                </div><!-- End .accordion -->
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                                <span class="btn-text">Place Order</span>
                                                <span class="btn-hover-text">Proceed to Checkout</span>
                                            </button>
                                        </div><!-- End .summary -->
                                    </aside><!-- End .col-lg-3 -->
                                </div><!-- End .row -->
                            </form>
                        </div><!-- End .container -->
                    </div><!-- End .checkout -->
                </div><!-- End .page-content -->
@endsection
@section('js')

<script>
    $(document).ready(function(){
        $('body').on('click','.select_payment',function(){
            let payment_id=$(this).val();
            let account_number=$(this).attr('account_number');

            if (account_number=="") {
                $('#account_number').text();
                $('#payment_area').hide();
                $('#transaction_number').removeAttr('required');
            }else{
                $('#account_number').text(account_number);
                $('#payment_area').show();
                $('#transaction_number').attr('required', 'true');
            }
        });

      
    });
</script>
@endsection