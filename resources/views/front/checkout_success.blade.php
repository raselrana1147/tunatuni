@extends('layouts.app')
@section('title','TunaTuni | Cart View')

@section('content')
    <div class="page-content">
        <div class="checkout">
            <div class="row">
                <div class="offset-4"></div>
                <div class="col-md-4"><h3 class="alert alert-success">Your order has successfully placed. We will reach out you very soon</h3>
            <a href="{{ route('front.index') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a></div>
            </div>
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
@endsection
@section('js')
@endsection