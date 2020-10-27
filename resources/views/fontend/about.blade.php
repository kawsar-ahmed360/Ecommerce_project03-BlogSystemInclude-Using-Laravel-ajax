@extends('fontend.master')


@section('content')


  <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>About us</h2>
                        <ul>
                        	@auth
                            <li><a href="index.html">Home</a></li>
                            @else
                            <li><span>About</span></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- about-area start -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-wrap text-center">
         @foreach(App\abouts::all() as $abou)

                        <h3>{{$abou->about_title}}</h3>
                        <p style="text-align: justify;">{{$abou->about_description}}</p>

            @endforeach          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->
   <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="public/ecom/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">

              


     @foreach($viewbestpro as $probest)

                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img src="{{url('public/image/product_image/',$probest->products['product_thummel'])}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="single-product.html">{{$probest->products['product_title']}}</a></h3>
                            <p class="pull-left">${{$probest->products['product_price']}}

                            </p>
                            <ul class="pull-right d-flex">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </li>
   @endforeach

                


            </ul>
        </div>
    </div>
    <!-- product-area end -->

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