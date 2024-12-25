<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">{{ $headding->find(2)->title ?? '' }}</h2>
                <p>{{ $headding->find(2)->description ?? '' }}</p>

                <div class="row my-5">
                    @foreach ($departments->take(4) as $department)
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset($department->image ?? '') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>{{ $department->title ?? '' }}</h3>
                                <p>{{ $department->description ?? '' }}</p>
                            </div>
                        </div>							
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{ asset($headding->find(2)->image ?? '') }}" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>