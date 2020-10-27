@extends('fontend.master')
@section('title')
Login page
@endsection
@section('content')



    <div class="breadcumb-area ptb-100" style="background-image: url('public/ecom/images/bg/3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Account</h2>
                        <ul>
                            @auth
                            <li><a href="index.html">Home</a></li>
                            @else
                            <li><span>Login</span></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                     <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <p>{{ __('User Name or Email Address *') }}</p>
                        <input type="email" class="@error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <p>{{ __('Password') }}</p>
                        <input type="Password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <div class="row">
                            <div class="col-lg-12">
                               <a href="{{route('redirectToProvider')}}">Login wtih <i class="fa fa-github"></i></a>
                               <a href="">Login wtih <i class="fa fa-google-plus"></i></a>
                            </div>
                        
                           
                        </div>

                         <div class="row">
                            <div class="col-lg-6">
                                <input id="password" type="checkbox" >
                                <label for="password">Save Password</label>
                            </div>
                            <div class="col-lg-6 text-right">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                                  @endif
                            </div>
                           
                        </div>


                        <button type="submit" >Login</button>
                        <div class="text-center">
                            <a href="{{route('register')}}">Or Creat an Account</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->



@endsection
