@extends('frontend.layout.master')
@section('body-content')
<!-- Start Hero Section -->
@include('frontend.include.hero' , ['page' => 'about'])
<!-- End Hero Section -->

		

		<!-- Start Why Choose Us Section -->		
		@include('frontend.include.why-choose')
		<!-- End Why Choose Us Section -->

		<!-- Start Team Section -->
		<div class="untree_co-section">
			<div class="container">

				<div class="row mb-5">
					<div class="col-lg-5 mx-auto text-center">
						<h2 class="section-title">Our Team</h2>
					</div>
				</div>

				<div class="row">
					@foreach ($projects as $project)
					<!-- Start Column 1 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="{{ asset($project->image) }}" class="img-fluid mb-5">
						<h3 clas><a href="{{ $project->facebook }}">{{ $project->title }}</a></h3>
						<span class="d-block position mb-4">{{ $project->designation }}</span>
						<p>{!! $project->description !!}</p>
						<p class="mb-0"><a href="{{ $project->facebook }}" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
					</div> 
					<!-- End Column 1 -->						
					@endforeach
				</div>
			</div>
		</div>
		<!-- End Team Section -->

		

		<!-- Start Testimonial Slider -->
		@include('frontend.include.testimonial')
		<!-- End Testimonial Slider -->
@endsection