@extends('frontend.layout.master')


@push('meta-title')
    {{ env('APP_NAME') }}
@endpush


@section('body-content')
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Blog Grid</h2>
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Blog List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Single Blog -->
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="{{asset($blog->blog_image)}}" alt="#">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <div class="date">{{$blog->created_at->format('M d, Y')}}</div>
                                        <h2><a href="{{route('blogDetail',$blog->id)}}">{{$blog->blog_title}}</a></h2>
                                        <p class="text">{{$blog->blog_short_desc}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Blog -->
                        </div>
                        @endforeach
                        
{{--  Pagination --}}
                            <div class="mt-5 col-12 justify-content-center">
                        <span class="text-center">  {{$blogs->links()}} </span>
                            </div>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="post" action="{{route('blogSearch')}}" >
                                @csrf
                                <input type="text" name="blog_title" placeholder="Search Here...">
                                <button class="button" type="submit" href="#"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->

                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>

                            @foreach($recentBlogs as $recentBlog)
                                <!-- Single Post -->
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{asset($recentBlog->blog_image)}}" alt="#">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{route('blogDetail',$recentBlog->id)}}">{{$recentBlog->blog_title}}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$recentBlog->created_at->format('M d, Y')}}</li>
                                            {{--                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                      
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



@push('script-tag')

@endpush