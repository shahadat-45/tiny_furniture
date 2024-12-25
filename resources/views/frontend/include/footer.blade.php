<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img">
            <img src="{{ asset($setting->appointment_side_img) }}" alt="Image" class="img-fluid">
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class="d-flex align-items-center"><span class="me-1"><img src="{{ asset('public/frontend/images/envelope-outline.svg') }}" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                    <form id="newsletterForm" class="row g-3">
                        @csrf
                        <div class="col-auto">
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="col-auto">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary newsletterBtn" type="submit">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                    <p class="text-success mt-2" id="success"></p>
                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="{{ route('home') }}" class="footer-logo"><img src="{{ asset($setting->logo) }}" alt="logo" height="40px"></a></div>
                <p class="mb-4">{{ $setting->footer_text }}</p>

                <ul class="list-unstyled custom-social">
                    <li><a href="{{ $setting->facebook }}"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="{{ $setting->twitter }}"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="{{ $setting->instagram }}"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="{{ $setting->linkedin }}"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('about.us') }}">About us</a></li>
                            <li><a href="{{ route('service') }}">Services</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Knowledge base</a></li>
                            <li><a href="#">Live chat</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Nordic Chair</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ergonomic Chair</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://danpite.tech/">Danpite.tech</a> </a> 
                    </p>
                </div>

                {{-- <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div> --}}

            </div>
        </div>

    </div>
</footer>
<!-- End Footer Section -->	
