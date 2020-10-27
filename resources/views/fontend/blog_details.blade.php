@extends('fontend.master')

@section('title')
blog details
@endsection

@section('content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog Details</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Blog Details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- blog-details-area start-->
    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
@php
 use carbon\carbon;
@endphp


@foreach($user as $username)

@endforeach

<!-- ..............blog post view...... -->
@foreach($blogpostviews as $viewpost)

@endforeach




                <div class="col-lg-9 col-12">
                    <div class="blog-details-wrap">
                        <img src="{{url('public/image/blog_image/'.$blogdetais->blog_image)}}" width="850px"  alt="">
                        <h3>{{$blogdetais->blog_title}} <span style="float: right;font-size: 24px;font-weight: bold">view <sup style="background-color: red;padding: 5px;border-radius: 50% 50% 50% 10%;color: white">{{$viewpost->viewcount}}</sup></span> </h3>
                        <ul class="meta">
                            
                            <li>{{$blogdetais->created_at->format('d.M.Y')}}</li>
                            <li>By {{$username->name}}</li>
                        </ul>
                        <p style="text-align: justify;">{{$blogdetais->blog_description}}</p>
                        <div class="share-wrap">
                            <div class="row">
                                <div class="col-sm-7 ">
                                    <ul class="socil-icon d-flex">
                                        <li>share it on :</li>


                          @foreach($social as $soci)
                                        <li><a href="{{$soci->social_link}}"><i class="{{$soci->social_icon}}"></i></a></li>
                            @endforeach

                           


                                    </ul>
                                </div>
                                <div class="col-sm-5 text-right">

                                
                                   
                                   @if($next)

                                     <a href="{{route('blogsdetails',$next->slug )}}">Next Post <i class="fa fa-long-arrow-right"></i></a>
                                       
                                       @endif

                                        

                                    
                                       
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form-area">
                        <div class="comment-main">
  
@foreach($all as $count)



  @endforeach
                  
                            
                            <h3 class="blog-title"><span></span>Comments:</h3>

                         
                            <ol class="comments">
                                <li class="comment even thread-even depth-1">
                             
                               @foreach($all as $commect)

                                    <div class="comment-wrap">
                                        <div class="comment-theme">
                                            <div class="comment-image">
                                                <img src="{{url('public/image/commenter_image/',$commect->commenter_image)}}" width="100px" alt="Jhon">
                                            </div>
                                        </div>
                                        <div class="comment-main-area">
                                            <div class="comment-wrapper">
                                                <div class="sewl-comments-meta">
                                                    <h4>{{$commect->name}}</h4>
                                                    <span>{{$commect->created_at}}</span>
                                                </div>
                                                <div class="comment-area">
                                                    <p>{{$commect->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                  


                                
                  
                       

                                </li>
                                {{$all->links()}}
                            </ol>
                   

                        </div>
                        <div id="respond" class="sewl-comment-form comment-respond form-style">
                            <h3 id="reply-title" class="blog-title">Leave a <span>comment</span></h3>


             <!--  comment form -->
                            <form novalidate="" method="post" id="commentform" class="comment-form" action="{{route('postcomment')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sewl-form-inputs no-padding-left">
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <input id="name" name="name" value="" tabindex="2" placeholder="Name" type="text">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input id="email" name="email" value="" tabindex="3" placeholder="Email" type="email">
                                                </div>

                                                 <div class="col-sm-12 col-12">
                                                    <input id="commenter_image" name="commenter_image" value="" tabindex="4" type="file">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="sewl-form-textarea no-padding-right">
                                            <textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="Write Your Comments..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-submit">
                                            <input name="submit" id="submit" value="Send" type="submit">
                                            <input name="comment_post_ID" value="1" id="comment_post_ID" type="hidden">
                                            <input name="comment_parent" id="comment_parent" value="0" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </form>

                          <!--  end comment form  -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">Categories</h4>
                            <ul>

                             

                                <li><a href="#">{{$blogdetais->AddCatergory['category_name']}}</a></li>

                              
                               
                            </ul>
                        </div>
                        <div class="widget widget_recent_entries recent_post">
                            <h4 class="widget-title">Recent Post</h4>
                            <ul>

                          @foreach($resentproduct as $resent)
                                <li>
                                    <div class="post-img">
                                        <img src="{{url('public/image/blog_image/',$resent->blog_image)}}" width="100px" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="{{route('blogsdetails',$resent->slug )}}">{{$resent->blog_title}}</a>
                                        <p>{{$resent->created_at->format('d.M.Y')}}</p>
                                    </div>
                                </li>

                                @endforeach

                                

                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-details-area end -->
   
    <!-- end social-newsletter-section -->


@endsection