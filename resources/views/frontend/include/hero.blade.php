@php
    	$banner = App\Models\Banner::where('page' , $page)->first();
@endphp
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>{!! $banner->title !!}</h1>
                    <p class="mb-4">{{ $banner->description }}</p>
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset($banner->banner_img) }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>