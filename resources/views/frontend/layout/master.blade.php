<!DOCTYPE html>
<html lang="en">
@php $setting = App\Models\BasicInfo::find(1); @endphp
<head>
     @include('frontend.include.head-titles')
     @yield('style')    
</head>

<body>
   @include('frontend.include.header')

        <!-- Body container start -->

            @yield('body-content')

        <!-- Body container end -->

    <!-- Footer section start -->
         @include('frontend.include.footer')
    <!-- Footer section end -->


     @include('frontend.include.script')

</body>
</html>


