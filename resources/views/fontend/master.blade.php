<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/bootstrap.min.css')}}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/owl.carousel.min.css')}}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/font-awesome.min.css')}}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/flaticon.css')}}">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/jquery-ui.css')}}">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/metisMenu.min.css')}}">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/swiper.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/styles.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{URL::asset('public/ecom/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{URL::asset('public/ecom/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                      

                           

                            <li><i class="fa fa-phone"></i>0454588545</li>
                            <li><i class="fa fa-envelope"></i>amid@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    @auth
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{route('wishlist')}}">wishlist</a></li>
                                    @endauth
                                </ul>
                            </li>
                            <li><a href="{{route('register')}}"> Login/Register </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="index.html">
                        <img src="public/ecom/assets/images/logo.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{route('/')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="{{route('shops')}}">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="{{route('shops_card')}}">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="{{route('faqpage')}}">FAQ</a></li>
                                    </ul>
                                </li>
                                  
                                   <li><a href="{{route('cart')}}">Cart</a></li>

                         
                                    
                                  
                                        <li><a href="{{route('blog')}}">Blog</a></li>
                                       
                                    
                               
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>


                              


                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>5</span></a>
                                <ul class="cart-wrap dropdown_style">
         
         @php
          $total =0;
         @endphp
                   
                   @foreach(App\lovecarts::get() as $love)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{url('public/image/product_image/',$love->products['product_thummel'])}}" width="60px" alt="">
                                        </div>

                                        <div class="cart-content">
                                            <a href="cart.html">{{$love->products['product_title']}}</a>
                                            <span>QTY : {{$love->product_quentity}}</span>
                                            <p>${{$love->products['product_price']}}</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>

                                    @php

                                    $total +=$love->product_quentity * $love->products['product_price'];

                                    @endphp

                                    <li>Subtotol: <span class="pull-right">${{$love->product_quentity * $love->products['product_price']}}</span></li>

                    @endforeach                

                                   



                                    
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                </ul>
                            </li>
                            <li>


                              

                              


                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span></span></a>
                                <ul class="cart-wrap dropdown_style">

                                @php
                                use App\products;
                                use App\cart;
                                
                               $user_ip = $_SERVER['REMOTE_ADDR'];

                               $total = 0;
                                @endphp


                                     @foreach(App\cart::where('user_ip',$user_ip)->get() as $itemsiview )

                                    <li class="cart-items">

                                        <div class="cart-img">
                                            <img src="{{url('public/image/product_image/',$itemsiview->products['product_thummel'])}}" width="70px" alt="">
                                        </div>
                                        <div class="cart-content" style="font-size: 10px;">
                                            <a style="font-size: 10px" href="cart.html">{{$itemsiview->products['product_title']}}</a>
                                            <span>QTY:{{$itemsiview->product_quentity}}</span>
                                            <p>${{$itemsiview->products['product_price']}}</p>
                                         @php
                                            $total +=$itemsiview->products['product_price'] * $itemsiview->product_quentity;
                                          @endphp
                                   
                                            <td class="remove" data-id="{{$itemsiview->id}}" ><i class="fa fa-times"></i></td>
                                        </div>

                                    </li>

                                    
       

                                    @endforeach

                            

                                  
                                   
                                    <li>Subtotol: <span class="pull-right">${{$total}}</span></li>

                                    

                                    <li>
                                          <button><a style="color: black" href="{{route('check_out')}}">Checkout</a></button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->


@yield('content')



    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">


                                @foreach(App\social_icons::get() as $social)
                                <li><a href="{{$social->social_link}}"><i class="{{$social->social_icon}}"></i></a></li>
                               @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>

                              
                                <li><a href="#"><span>Email:</span>hamd@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span>049854545</a></li>
                                <li><a href="#"><span>Adress:</span>dhaka,bangladesh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>

                               
                                <li>Honney@copywrite</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->



<script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('.remove').click(function(){

        var value = $(this).attr("data-id");

        

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
     
  Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

  window.location.href = "{{url('cartdel/')}}/"+value;


   
  }
})
    })

    })

</script>
   
    <!-- jquery latest version -->
    <!-- jquery latest version -->
    <script src="{{URL::asset('public/ecom/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{URL::asset('public/ecom/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{URL::asset('public/ecom/js/owl.carousel.min.js')}}"></script>
    <!-- scrollup.js -->
    <script src="{{URL::asset('public/ecom/js/scrollup.js')}}"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{URL::asset('public/ecom/js/isotope.pkgd.min.js')}}"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{URL::asset('public/ecom/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{URL::asset('public/ecom/js/jquery.zoom.min.js')}}"></script>
    <!-- countdown.js -->
    <script src="{{URL::asset('public/ecom/js/countdown.js')}}"></script>
    <!-- swiper.min.js -->
    <script src="{{URL::asset('public/ecom/js/swiper.min.js')}}"></script>
    <!-- metisMenu.min.js -->
    <script src="{{URL::asset('public/ecom/js/metisMenu.min.js')}}"></script>
    <!-- mailchimp.js -->
    <script src="{{URL::asset('public/ecom/js/mailchimp.js')}}"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{URL::asset('public/ecom/js/jquery-ui.min.js')}}"></script>
    <!-- main js -->
    <script src="{{URL::asset('public/ecom/js/scripts.js')}}"></script>

    @yield('footer')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
