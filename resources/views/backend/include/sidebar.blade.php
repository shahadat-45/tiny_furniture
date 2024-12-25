<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo d-flex justify-content-center mb-3">
        <a href="{{ route('dashboards') }}" class="app-brand-link">
            @if ( !empty($basicInfo->logo) )
                <img src="{{ asset($basicInfo->logo) }}" width="180px" height="" alt="logo">
            @else

                <img src="{{ asset('public/frontend/img/logo.png') }}" alt="">
            @endif
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if(request()->is('admin/dashboards')) active  @endif">
            <a href="{{ route('dashboards') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->

        <!--  Banner Section  -->
        <li class="menu-item @if(request()->is('admin/banner')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-message-square-dots"></i>
                <div data-i18n="Layouts">Banner</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.banner.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Banner</div>
                    </a>
                </li>
            </ul>
        </li>


        <!--  About Section  -->
        {{-- <li class="menu-item @if(request()->is('admin/about')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div data-i18n="Layouts">About</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.about.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage About</div>
                    </a>
                </li>
            </ul>
        </li> --}}


        <!--  Gallery Section  -->
        <li class="menu-item @if(request()->is('admin/project')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Layouts">Our Team</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.project.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Team</div>
                    </a>
                </li>
            </ul>
        </li>


        <!--  Contact Section  -->
        <li class="menu-item @if(request()->is('admin/contact')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-phone-call"></i>
                <div data-i18n="Layouts">Contact</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.contact.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Contact</div>
                    </a>
                </li>
            </ul>
        </li>


        {{--    Department    --}}
        <li class="menu-item @if(request()->is('admin/department')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Layouts">Interior Design</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.department.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Interior Design</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('furniture') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Furniture</div>
                    </a>
                </li>
            </ul>
        </li>


        <!--  Doctor Section  -->
        <li class="menu-item @if(request()->is('admin/doctor')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Layouts">Material</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.doctor.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Excellent Material</div>
                    </a>
                </li>
            </ul>
        </li>



        

        <!--  Doctor Section  -->
        <li class="menu-item @if(request()->is('admin/choose-us')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Layouts">Service</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('chooseUs.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Service</div>
                    </a>
                </li>
            </ul>
        </li>
        
        

        <!--  Doctor Section  -->
        {{-- <li class="menu-item @if(request()->is('admin/choose-us')) active  @endif">
            <a href="{{ route('admin.choos_us') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Layouts">Choose Us</div>
            </a>
        </li> --}}




        {{--   Schedule    --}}
        <li class="menu-item @if(request()->is('admin/schedule')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-time"></i>
                <div data-i18n="Layouts">Testimonials</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.schedule.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Testimonials</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--   Appointments    --}}
        <li class="menu-item @if(request()->is('admin/appointment')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Layouts">Newsletter</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.appointment.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Newsletter</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--   Blogs    --}}
        <li class="menu-item @if(request()->is('admin/blog')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Layouts">Blogs</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.blog.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Manage Blogs</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-header small text-uppercase"><span class="menu-header-text">Options</span></li>

        <!--  Settings  -->
        <li class="menu-item @if(request()->is('admin/basic-info')) active  @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.basic-info.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Basic Settings</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
