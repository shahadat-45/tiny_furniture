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
                        <h2>Search Result</h2>
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Blog Search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        @forelse($blogs as $blog)
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Single Blog -->
                                <div class="single-news">
                                    <div class="news-head">
                                        <img src="{{asset($blog->blog_image)}}" alt="#">
                                    </div>
                                    <div class="news-body">
                                        <div class="news-content">
                                            <div class="date">{{$blog->created_at->format('M d, Y')}}</div>
                                            <h2><a href="{{route('blogDetail',$blog->id)}}">{{$blog->blog_title}}</a>
                                            </h2>
                                            <p class="text">{{$blog->blog_short_desc}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Blog -->
                            </div>
                        @empty
                            <div class="col-lg-6 col-md-6 col-12">
                                <h3>No result found</h3>
                            </div>
                        @endforelse

                        {{--  Pagination --}}
                        <div class="col-12">
                            {{$blogs->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@push('script-tag')

@endpush