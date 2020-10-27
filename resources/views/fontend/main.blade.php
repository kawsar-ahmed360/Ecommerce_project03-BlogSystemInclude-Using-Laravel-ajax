@extends('fontend.master')
@section('title')
 home page
@endsection
@section('content')


    <!-- slider-area start -->
    <div class="slider-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">

 @foreach(App\sliders::get() as $sli)

                <div class="swiper-slide overlay">
                    <div class="single-slider slide-inner slider-inner1" style='background: url("{{asset("public/image/slider_image/".$sli->slider_image)}}"); width: 100%'  >
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-lg-9 col-12">
                                    <div class="slider-content">
                                        <div class="slider-shape">
                                            <h2 data-swiper-parallax="-500">{{$sli->slider_name}}</h2>
                                            <p data-swiper-parallax="-400">{{$sli->slider_summery}}</p>
                                            <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider-area end -->



    <!-- featured-area start -->
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style">
           
           @foreach(App\features::get() as $feature)

                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{url('public/image/feature_image/',$feature->product_image)}}" alt="">
                                <div class="featured-content">
                                    <a href="{{route('shops')}}">{{$feature->Product_title}}</a>
                                </div>
                            </div>
                        </div>

           @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->


    <!-- start count-down-section -->
    <div class="count-down-area count-down-area-sub">
        <section class="count-down-section section-padding parallax" data-speed="7">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 text-center">
                        <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                    </div>
                    <div class="col-12 col-lg-12 text-center">
                        <div class="count-down-clock text-center">
                            <div id="clock">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </div>
    <!-- end count-down-section -->

    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="public/ecom/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">




        

@foreach($bestsel as $key=>$itemsss)
           

                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img src="{{url('public/image/product_image/'.$itemsss->products['product_thummel'])}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{$itemsss->id}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="single-product.html">{{$itemsss->products['product_title']}}</a><span style="float: right;font-size: 15px;">Total sale <sup style="font-size: 18px;background-color: red;padding: 4px;color:white;border-radius: 50%">{{$itemsss->product_quentity}}</sup></span></h3>
                            <p class="pull-left">${{$itemsss->products['product_price']}}

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


                <div class="modal fade" id="exampleModalCenter{{$itemsss->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{url('public/image/product_image/'.$itemsss->products['product_thummel'])}}" alt="{{$itemsss->product_title}}" style="border-radius: 10px;">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>{{$itemsss->products['product_title']}}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{$itemsss->product_price}}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{$itemsss->products['product_summery']}}</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="{{$itemsss->product_quentity}}" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{$itemsss->products->AddCatergory['category_name']}}</a></li>
                          
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->
 

  @endforeach        
              


            </ul>
        </div>
    </div>
    <!-- product-area end -->
    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="public/ecom/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">

                @foreach($item as $key => $items)


                <li class="col-xl-3 col-lg-4 col-sm-6 col-12  @if($key > 3) moreload @endif">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{url('public/image/product_image')}}/{{$items->product_thummel}}" alt="{{$items->product_title}}">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{$items->id}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{route('lovecart',$items->id)}}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{route('single-card',$items->id)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('singlepage',$items->slug )}}">{{$items->product_title}}</a></h3>
                            <p class="pull-left">${{$items->product_price}}

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




                 <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter{{$items->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{url('public/image/product_image')}}/{{$items->product_thummel}}" alt="{{$items->product_title}}" style="border-radius: 10px;">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>{{$items->product_title}}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{$items->product_price}}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{$items->product_summery}}</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="{{$items->product_quentity}}" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{$items->AddCatergory['category_name']}}</a></li>
                          
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->
          

          @endforeach


               


                 <li class="col-12 text-center">
                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- product-area end -->


    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">

                    <div class="testmonial-active owl-carousel">


      @foreach(App\testimonials::get() as $tes)
      
                        <div class="test-items test-items2">
                            <div class="test-content">
                                <p>{{$tes->cliend_comment}}</p>
                                <h2>{{$tes->cliend_name}}</h2>
                                <p>{{$tes->client_profession}}</p>
                            </div>
                            <div class="test-img2">
                                <img src="{{url('public/image/testimonial_image/',$tes->client_image)}}" alt="">
                            </div>
                        </div>

     @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->
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