@extends('fontend.master')


@section('title')

Register page

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
                            <li><span>Register</span></li>
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


                  <form method="POST" action="{{ route('register') }}">
                        @csrf

                         
                     <p>{{ __('Name') }}</p>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                         @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                  

                        <p>{{ __('User Name or Email Address *') }}</p>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <p>{{ __('Password') }}</p>
                        <input type="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" name="password" >

                           @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                        <p>{{ __('Confirm Password') }}</p>
                        <input type="Password" required autocomplete="new-password" name="password_confirmation">



                    

                        <button type="submit">Register</button>
                        <div class="text-center">
                            <a href="{{route('login')}}">Or Login</a>
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
@endsection
















