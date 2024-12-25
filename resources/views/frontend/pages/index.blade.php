	@extends('frontend.layout.master')
	@section('body-content')
	<!-- Start Hero Section -->		 
	
	@include('frontend.include.hero' , ['page' => 'home'])
	<!-- End Hero Section -->

	<!-- Start Product Section -->
	@include('frontend.include.material')
	<!-- End Product Section -->

	<!-- Start Why Choose Us Section -->
	@include('frontend.include.why-choose')
	<!-- End Why Choose Us Section -->

	<!-- Start We Help Section -->
	<div class="we-help-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-5 mb-lg-0">
					<div class="imgs-grid">
						@php
							$images = json_decode($headding->find(3)->image, true);
						@endphp
						@forelse ($images as $i => $image)
						<div class="grid grid-{{ $i + 1 }}"><img src="{{ asset($image ?? '') }}" alt="Untree.co"></div>
							
						@empty
							
						@endforelse
					</div>
				</div>
				<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">{{ $headding->find(3)->title ?? '' }}</h2>
					<p>{{ $headding->find(3)->description ?? '' }}</p>

					<ul class="list-unstyled custom-list my-4 d-flex flex-wrap">
						@foreach ($interiors as $interior)
							<li>{{ $interior->text }}</li>							
						@endforeach
					</ul>
					<p><a herf="#" class="btn">Explore</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- End We Help Section -->

	<!-- Start Popular Product -->
	<div class="popular-product">
		<div class="container">
			<div class="row">
				@foreach ($furnitures->take(3) as $furniture)
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset($furniture->image) }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>{{ $furniture->title }}</h3>
								<p>{{ $furniture->description }}</p>
								<p><a href="{{ $furniture->link }}">Read More</a></p>
							</div>
						</div>
					</div>					
				@endforeach
			</div>
		</div>
	</div>
	<!-- End Popular Product -->

	<!-- Start Testimonial Slider -->
	@include('frontend.include.testimonial');
	<!-- End Testimonial Slider -->

	<!-- Start Blog Section -->
	<div class="blog-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6">
					<h2 class="section-title">Recent Blog</h2>
				</div>
				<div class="col-md-6 text-start text-md-end">
					<a href="{{ route('blog') }}" class="more">View All Posts</a>
				</div>
			</div>
			<div class="row">
				@foreach ($blogs->take(3) as $blog)
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="{{ route('blogDetail' , $blog->id) }}" class="post-thumbnail"><img src="{{ asset($blog->blog_image) }}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="{{ route('blogDetail' , $blog->id) }}">{{ $blog->blog_title }}</a></h3>
								<div class="meta">
									<span>by <a href="{{ route('blogDetail' , $blog->id) }}">{{ $blog->blog_author }}</a></span> <span>on <a href="#">{{ $blog->blog_date }}</a></span>
								</div>
							</div>
						</div>
					</div>					
				@endforeach
			</div>
		</div>
	</div>
	<!-- End Blog Section -->		
	@endsection