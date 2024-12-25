<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">{{ $headding->find(1)->title ?? '' }}</h2>
                <p class="mb-4">{{ $headding->find(1)->description ?? '' }}</p>
                <p><a href="{{ route('shop') }}" class="btn">Explore</a></p>
            </div>

            <!-- Start Column -->
            @foreach ($material->take(3) as $item)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item">
                        <img src="{{ asset($item->image) }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{ $item->title }}</h3>

                        <span class="icon-cross">
                            <img src="{{ asset('public/frontend/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column -->
            @endforeach

        </div>
    </div>
</div>