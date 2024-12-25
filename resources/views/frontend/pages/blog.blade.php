@extends('frontend.layout.master')
@section('body-content')
<!-- Start Hero Section -->
@include('frontend.include.hero' , ['page' => 'blog'])
<!-- End Hero Section -->



<!-- Start Blog Section -->
<div class="blog-section">
	<div class="container">
		
		<div class="row">
			@foreach ($blogs as $blog)
				<div class="col-12 col-sm-6 col-md-4 mb-5">
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



<!-- Start Testimonial Slider -->
@include('frontend.include.testimonial')
<!-- End Testimonial Slider -->
@endsection