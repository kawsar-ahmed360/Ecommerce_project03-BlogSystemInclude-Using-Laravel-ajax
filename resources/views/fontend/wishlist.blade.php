@extends('fontend.master')

@section('title')

@endsection

@section('content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Wishlist</span></li>
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
                    <form action="http://themepresss.com/tf/html/tohoney/cart">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="stock">Stock Stutus </th>
                                    <th class="addcart">Add to Cart</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                      @foreach(App\lovecarts::get() as $love)      	

                                <tr>
                                    <td class="images"><img src="{{url('public/image/product_image/',$love->products['product_thummel'])}}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{$love->products['product_title']}}</a></td>
                                    <td class="ptice">${{$love->products['product_price']}}</td>

                                    @if($love->products['product_quentity']>0)
                                  <td class="stock">In Stock</td>
                                   @else
                                   <td class="stock">out of Stock</td>
                                    @endif


                                    @if($love->products['product_quentity']>0)
                                    
                                    <td class="addcart"><a href="{{route('single-card',$love->products['id'])}}">Add to Cart</a></td>

                                    @else

                                    <td class="addcart"><a style="background-color: silver" href="#">Add to Cart</a></td>

                                    @endif

                                    <td class="remove"><i class="fa fa-times"></i></td>
                                </tr>

                          @endforeach      

                               


                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->


@endsection