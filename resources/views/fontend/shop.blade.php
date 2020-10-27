@extends('fontend.master')


@section('title')
shop page
@endsection

@section('content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            @auth
                            <li><a href="{{route('/')}}">Home</a></li>
                            @else
                            <li><span>Shop</span></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">


                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>



                       @foreach($category as $cate)
                            <li>
                                <a data-toggle="tab" href="#chair{{$cate->id}}">{{$cate->category_name}}</a>
                            </li>

                       @endforeach  


                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">

                    <ul class="row">

                   @foreach($allpro as $key=>$allproduct)

                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if($key>7) moreload @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                   
                                    <img src="{{url('public/image/product_image/'.$allproduct->product_thummel)}}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{route('singlepage',$allproduct->slug)}}">{{$allproduct->product_title}}</a></h3>
                                    <p class="pull-left">${{$allproduct->product_price}}

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
 
                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>



                    </ul>

                </div>

             @foreach($category as $cate2)
              
               

                <div class="tab-pane" id="chair{{$cate2->id}}">
                    <ul class="row">

                      @foreach(App\products::where('category_id',$cate2->id)->get() as $itemsss ) 
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{url('public/image/product_image/'.$itemsss->product_thummel)}}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{route('singlepage',$itemsss->slug)}}">{{$itemsss->product_title}}</a></h3>
                                    <p class="pull-left">${{$itemsss->product_price}}

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

               

          @endforeach
              

            </div>
        </div>
    </div>
  
    <!-- end social-newsletter-section -->


@endsection