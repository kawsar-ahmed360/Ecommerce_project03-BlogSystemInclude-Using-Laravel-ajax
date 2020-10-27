@extends('fontend.master')

@section('title')
{{$single->product_title}}
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
                            <li><a href="index.html">Home</a></li>
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
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{url('public/image/product_image')}}/{{$single->product_thummel}}" alt="">
                            </div>
                         
                         @foreach(App\product_galleries::where('product_id',$single->id)->get() as $imges)

                            <div class="item">
                                <img src="{{url('public/image/product_gellary').'/'.$imges->product_gellary}}" alt="">
                            </div>

                        @endforeach


                        </div>
                        <div class="product-thumbnil-active  owl-carousel">

                             <div class="item">
                                <img src="{{url('public/image/product_image')}}/{{$single->product_thummel}}" alt="">
                            </div>


                            @foreach(App\product_galleries::where('product_id',$single->id)->get() as $imges)

                            <div class="item">
                                <img src="{{url('public/image/product_gellary').'/'.$imges->product_gellary}}" alt="">
                            </div>

                        @endforeach


                         


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">

                        @foreach($viewadd as $viewori)

                        @endforeach

                        
                        <h3>{{$single->product_title}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green;font-size: 19px">view <sup style="background: red;padding: 6px; border-radius: 60%;color: white;">{{$viewori->visitor}}</sup></span></h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{$single->product_price}}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{$single->product_summery}}</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{$single->AddCatergory['category_name']}}</a></li>
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
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{$single->product_description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">


                            @foreach(App\singleproductfaq::all() as $key => $FAQ)

                                <div class="card">

                                    <div class="card-header" id="headingOne">
                                        <h5><button data-toggle="collapse" data-target="#collapseOne{{$FAQ->id}}" aria-expanded="true" aria-controls="collapseOne">{{$FAQ->question}}</button> </h5>
                                    </div>

                                    <div id="collapseOne{{$FAQ->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            {{$FAQ->quention_ans}}
                                        </div>
                                    </div>
                                </div>

                         @endforeach
                             

                                
                            </div>
                        </div>

                        
             

                        <div class="tab-pane" id="review">
                            <div class="review-wrap">

                              

                                <ul>
                                  

                                    @php

                                    use carbon\carbon;

                                    @endphp


                                   
                       
                                   
                                    @foreach($prodcut_reviewss as $review)
                                   
                                    <li class="review-items" style="margin-top: 30px">
                                       
                                        <div class="review-img">
                                            <img src="public/ecom//images/comment/1.png" alt="">
                                        </div>

                                        <div class="review-content">
                                            <h3><a href="#">{{$review->name}}</a></h3>
                                            <span>{{carbon::parse($review->from_date)->format('d.M.Y.h.m.s')}}</span>
                                            <p>{{$review->massage}}</p>
                                            <ul class="rating">

                                                

                                                <li>
                                                   
                                                   @if($review->a <=0)

                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   
                                                   @elseif($review->a ==1)
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>

                                                    @elseif($review->a ==2)
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>

                                                     @elseif($review->a ==3)
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                                                
                                                 @elseif($review->a ==4)
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star-o" aria-hidden="true"></i>

                                                    @elseif($review->a ==5)
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                             
                                                 
                                                   
                                                 

                                                  @endif  


                                                </li>

                                                
                                               

                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach

                                   

                                    
                                  

                                   
                   
                   
                
                                   


                                </ul>
                               
                            </div>



  
                  @if($ceckreview)

                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               
                                                <td>How Many Stars?</td>
                                                 <form action="{{route('product_reviewpost')}}" method="POST">
                                                    @csrf
                                                <td>
                                                    <input type="radio"  value="1" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio"  value="2" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio"  value="3" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio"  value="4" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio"  value="5" name="a" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" name="name" placeholder="Your name here..." />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" name="email" placeholder="Your Email here..." />
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style" type="submit" >Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>


                           @else
                           <div class="add-review">

                             </div>

                     @endif  

               


                        </div>



                   


                



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->


    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">



@foreach($itema as $tm)

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="featured-product-wrap">
                        <div class="featured-product-img">
                            <img src="{{url('public/image/product_image/'.$tm->product_thummel)}}" alt="">
                        </div>
                        <div class="featured-product-content">
                            <div class="row">
                                <div class="col-7">
                                    <h3><a href="shop.html">{{$tm->product_title}}</a></h3>
                                    <p>${{$tm->product_price}}</p>
                                </div>
                                <div class="col-5 text-right">
                                    <ul>
                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
@endforeach

            </div>
        </div>
    </div>
    <!-- featured-product-area end -->
  
    <!-- end social-newsletter-section -->


@endsection