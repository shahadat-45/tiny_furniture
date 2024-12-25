<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Testimonials</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">
                        @foreach ($testimonials as $testimonial )
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;{{ $testimonial->quate }}&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->author }}" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">{{ $testimonial->author }}</h3>
                                                <span class="position d-block mb-3">{{ $testimonial->designation }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> 
                            <!-- END item -->								
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>