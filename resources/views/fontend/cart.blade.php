@extends('fontend.master')
@section('title')

@endsection

<style type="text/css">
    
    .Couponbutton{
         width: 150px;
               height: 45px;
                position: absolute;
                right: 0;
                top: 0;
               background: #ef4836;
             color: #fff;
            text-transform: uppercase;
                border: none;
                line-height: 50px;
                                       
    }

    .Couponbutton:hover{
         background: #333;
         cursor: pointer;
    }

  
   .hovere{
    color:green;
   }

   .hovere:hover span {display: none}

   .hovere:hover:before{content: 'replay!'}


</style>
@section('content')

 <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('cart-update')}}" method="POST">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $total = 0;
                                @endphp

                            	@foreach($carts as $view)

                                <tr>

                                    <input type="hidden" value="{{$view->id}}" name="update_id[]">
                                    <td class="images"><img src="{{url('public/image/product_image/'.$view->products['product_thummel'])}}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{$view->products['product_title']}}</a></td>
                                    <td class="ptice">${{$view->products['product_price']}}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" name="product_quentity[]" value="{{$view->product_quentity}}" />
                                    </td>
                                    @php
                                       $total +=$view->products['product_price'] * $view->product_quentity;
                                    @endphp
                                    <td class="total">${{$view->products['product_price'] * $view->product_quentity}}</td>
                                    <td class="remove" data-id="{{$view->id}}" ><a href="#"><i class="fa fa-times"></i></a></td>
                                </tr>

                                @endforeach


                               


                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button>Update Cart</button>
                                        </li>
                                        <li><a href="shop.html">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        @foreach(App\_coupon::all() as $coupo)
                                       
                                        @endforeach

                                        @php
                                           use Carbon\Carbon;

                                        @endphp

                                        @if($coupo->validaty>=carbon::now())
                                         <input type="text" value="{{$coupo->coupon_code}}" class="couponvalue" placeholder="Cupon Code">
                                         @else
                                         <input type="text"  value="Comming soon coupon..." class="hovere" placeholder="Cupon Code"> 
                                         @endif
                                        <span class="Couponbutton">Apply Cupon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{$total}}</li>
                                        <li><span class="pull-left">Discount(%) </span>%{{$discount}}</li>
                                        <li><span class="pull-left"> Total </span> 
                                        @if($discount)
                                        ${{($total-($total/100)*$discount)}}
                                         @else  ${{$total}}
                                   
                                
                                        @endif

                                        </li>
                                    </ul>
                                    <a href="{{route('check_out')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->

@endsection

@section('footer')


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

    //..............end delete section..

   
   $('.Couponbutton').click(function(){
     
     var couponvalue = $('.couponvalue').val();

      window.location.href = "{{url('cart/')}}/"+couponvalue;

   })

 })
</script>
@endsection