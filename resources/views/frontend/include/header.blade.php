		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($setting->logo) }}" alt="logo" height="40px"></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('home') }}">Home</a>
						</li>
						<li class="nav-item {{ Route::is('shop') ? 'active' : '' }}"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
						<li class="nav-item {{ Route::is('about.us') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about.us') }}">About us</a></li>
						<li class="nav-item {{ Route::is('service') ? 'active' : '' }}"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
						<li class="nav-item {{ Route::is('blog') ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
						<li class="nav-item {{ Route::is('contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
					</ul>

					{{-- <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="{{ asset('public/frontend/images/user.svg') }}"></a></li>
						<li><a class="nav-link" href="cart.html"><img src="{{ asset('public/frontend/images/cart.svg') }}"></a></li>
					</ul> --}}
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->