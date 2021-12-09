@extends('layouts.app')
@section('title',"TunaTuni | Sing Up")
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-lg-6">
                            <h2 class="title m-4">Sign Up</h2><!-- End .title mb-2 -->
                       

                            <form action="{{ route('register') }}" class="contact-form mb-3"  method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name *" value="{{ old('name') }}">
                                         @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email *" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="phone" class="sr-only">Phone</label>
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                         @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
                                         @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Address</label>
                                <textarea class="form-control" cols="30" rows="4" name="address" placeholder="Address"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>Sing Up</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form><!-- End .contact-form -->
                            <a href="{{ route('login') }}">Already have account?</a>
                        </div><!-- End .col-lg-6 -->
    </div>
</div>
@endsection
