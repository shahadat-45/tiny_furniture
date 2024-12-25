@extends('frontend.layout.master')
@section('body-content')
<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Shop</h1>
					</div>
				</div>
				<div class="col-lg-7">
					
				</div>
			</div>
		</div>
	</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section">
	<div class="container">
		  <div class="row">
			@foreach ($material as $material)
				<!-- Start Column 1 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="#">
						<img src="{{ $material->image }}" class="img-fluid product-thumbnail">
						<h3 class="product-title">{{ $material->title }}</h3>
						{{-- <strong class="product-price">$50.00</strong> --}}

						<span class="icon-cross">
							<img src="{{ asset('public/frontend/images/cross.svg') }}" class="img-fluid">
						</span>
					</a>
				</div> 				
			@endforeach
			<!-- End Column 1 -->			
		  </div>
	</div>
</div>
@endsection