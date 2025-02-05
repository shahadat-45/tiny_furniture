@extends('backend.layout.master')

@push('meta-title')
        Dashboard
@endpush

@push('add-css')

@endpush


@section('body-content')


    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome {{\Illuminate\Support\Facades\Auth::user()->name}}! 🎉</h5>
                <p class="mb-4">
                 Please Explore The Admin Panel and Make Changes if needed
                </p>

                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset('public/backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-6 mb-4">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="card-title d-flex align-items-start justify-content-between">--}}
{{--                        <div class="avatar flex-shrink-0">--}}
{{--                            <img src="{{ asset('public/backend/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />--}}
{{--                        </div>--}}
{{--                        <div class="dropdown">--}}
{{--                            <button--}}
{{--                                    class="btn p-0"--}}
{{--                                    type="button"--}}
{{--                                    id="cardOpt4"--}}
{{--                                    data-bs-toggle="dropdown"--}}
{{--                                    aria-haspopup="true"--}}
{{--                                    aria-expanded="false"--}}
{{--                            >--}}
{{--                                <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">--}}
{{--                                <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
{{--                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="d-block mb-1">Payments</span>--}}
{{--                    <h3 class="card-title text-nowrap mb-2">$2,456</h3>--}}
{{--                    <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6 mb-4">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="card-title d-flex align-items-start justify-content-between">--}}
{{--                        <div class="avatar flex-shrink-0">--}}
{{--                            <img src="{{ asset('public/backend/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />--}}
{{--                        </div>--}}
{{--                        <div class="dropdown">--}}
{{--                            <button--}}
{{--                                    class="btn p-0"--}}
{{--                                    type="button"--}}
{{--                                    id="cardOpt1"--}}
{{--                                    data-bs-toggle="dropdown"--}}
{{--                                    aria-haspopup="true"--}}
{{--                                    aria-expanded="false"--}}
{{--                            >--}}
{{--                                <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu" aria-labelledby="cardOpt1">--}}
{{--                                <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
{{--                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="fw-semibold d-block mb-1">Transactions</span>--}}
{{--                    <h3 class="card-title mb-2">$14,857</h3>--}}
{{--                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- </div>--}}

{{--        <div class="row"> -->--}}
{{--        <div class="col-12 mb-4">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">--}}
{{--                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">--}}
{{--                            <div class="card-title">--}}
{{--                                <h5 class="text-nowrap mb-2">Profile Report</h5>--}}
{{--                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-sm-auto">--}}
{{--                                <small class="text-success text-nowrap fw-semibold"--}}
{{--                                ><i class="bx bx-chevron-up"></i> 68.2%</small--}}
{{--                                >--}}
{{--                                <h3 class="mb-0">$84,686k</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="profileReportChart"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-4 col-md-4 order-1">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-12 col-6 mb-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-title d-flex align-items-start justify-content-between">--}}
{{--                                <div class="avatar flex-shrink-0">--}}
{{--                                    <img--}}
{{--                                            src="{{ asset('public/backend/assets/img/icons/unicons/chart-success.png') }}"--}}
{{--                                            alt="chart success"--}}
{{--                                            class="rounded"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button--}}
{{--                                            class="btn p-0"--}}
{{--                                            type="button"--}}
{{--                                            id="cardOpt3"--}}
{{--                                            data-bs-toggle="dropdown"--}}
{{--                                            aria-haspopup="true"--}}
{{--                                            aria-expanded="false"--}}
{{--                                    >--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span class="fw-semibold d-block mb-1">Profit</span>--}}
{{--                            <h3 class="card-title mb-2">$12,628</h3>--}}
{{--                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-12 col-6 mb-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="card-title d-flex align-items-start justify-content-between">--}}
{{--                                <div class="avatar flex-shrink-0">--}}
{{--                                    <img--}}
{{--                                            src="{{ asset('public/backend/assets/img/icons/unicons/wallet-info.png') }}"--}}
{{--                                            alt="Credit Card"--}}
{{--                                            class="rounded"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button--}}
{{--                                            class="btn p-0"--}}
{{--                                            type="button"--}}
{{--                                            id="cardOpt6"--}}
{{--                                            data-bs-toggle="dropdown"--}}
{{--                                            aria-haspopup="true"--}}
{{--                                            aria-expanded="false"--}}
{{--                                    >--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span>Sales</span>--}}
{{--                            <h3 class="card-title text-nowrap mb-1">$4,679</h3>--}}
{{--                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--       --}}
{{--    </div>--}}
  

@endsection



@push('custom-script')

@endpush
