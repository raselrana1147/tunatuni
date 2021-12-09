@extends('layouts.app')
@section('title',"Sing In")
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-lg-6">
                            <h2 class="title m-4">Login</h2><!-- End .title mb-2 -->
                       

                            <form action="{{ route('login') }}" method="post" class="contact-form mb-3">
                                @csrf
                               <div class="row">
                                   <div class="col-sm-10">
                                       <label for="name" class="sr-only">E-mail</label>
                                       <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail *" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                       @endif

                                   </div><!-- End .col-sm-6 -->
                               </div><!-- End .row -->

                               <div class="row">
                                    <div class="col-sm-10">
                                       <label for="email" class="sr-only">Passowrd</label>
                                       <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Passowrd *" value="{{ old('passowrd') }}">
                                       @if ($errors->has('password'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                       @endif
                                   </div><!-- End .col-sm-6 -->
                               </div>
                          

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>Sing In</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>

                            </form><!-- End .contact-form -->
                            <a href="{{ route('register') }}">Don't have any account?</a>
                        </div><!-- End .col-lg-6 -->
    </div>
</div>
@endsection
