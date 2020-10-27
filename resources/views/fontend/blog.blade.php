@extends('fontend.master')

@section('title')
blog page
@endsection

@section('content')


  <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog Page</h2>
                        <ul>
                        	@auth
                            <li><a href="index.html">Home</a></li>
                            @else
                            <li><span>Blog</span></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- blog-area start -->
    <div class="blog-area">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Latest News</h2>
                    <img src="public/ecom/images/section-title.png" alt="">
                </div>
            </div>
            <div class="row">

@php

use carbon\carbon;
use App\user;
@endphp

@foreach($User as $user)

@endforeach

                
     @foreach($blogview as $blog)
                
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <img src="{{url('public/image/blog_image/'.$blog->blog_image)}}" alt="">
                            <ul>
                                <li>{{$blog->created_at->format('d')}}</li>
                                <li>{{$blog->created_at->format('M')}}</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                 
                                 
                                   
                                   @if($user->user_role=='2')
                                    <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>

                                    @else
                                 
                                    <li><a href="#"><i class="fa fa-user"></i>User</a></li>
                                    @endif

                                    
                                    
                                    

                                    <li class="pull-right"><a href="#"><i class="fa fa-clock-o"></i>{{$blog->created_at}}</a></li>
                                </ul>
                            </div>
                            <h3><a href="{{route('blogsdetails',$blog->slug )}}">{{$blog->blog_title}}</a></h3>
                            <p style="text-align: justify;">{{Str::limit($blog->blog_description,200)}}</p>
                        </div>
                    </div>
                </div>

@endforeach


                <div class="col-12">
                    
                   
              {{$blogview->links()}}
                  
                </div>


            </div>
           
        </div>
    </div>
    <!-- blog-area end -->
 

@endsection