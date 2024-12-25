@extends('frontend.layout.master')
@section('body-content')
<!-- Start Hero Section -->
@include('frontend.include.hero' , ['page' => 'service'])
<!-- End Hero Section -->

		

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				
				
				<div class="row my-5">
					@foreach ($departments as $department)						
						<div class="col-6 col-md-6 col-lg-3 mb-4">
							<div class="feature">
								<div class="icon">
									<img src="{{ asset($department->image) }}" alt="Image" class="imf-fluid">
								</div>
								<h3>{{ $department->title }}</h3>
								<p>{{ $department->description }}</p>
							</div>
						</div>
					@endforeach
				</div>
			
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start Product Section -->		
		@include('frontend.include.material')
		<!-- End Product Section -->

		

		<!-- Start Testimonial Slider -->
		@include('frontend.include.testimonial')
		<!-- End Testimonial Slider -->
@endsection