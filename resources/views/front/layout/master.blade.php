<!DOCTYPE html>
<html>
<head>
    @include('front.layout.top')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
    <div id="main-wrapper">
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- preloader -->

        <div class="uc-mobile-menu-pusher">
            <div class="content-wrapper">
                @include('front.layout.header')
                <!-- header_section_wrapper -->

                @yield('content')

                @include('front.layout.footer')
            </div>
            <!-- #content-wrapper -->
        </div>
        <!-- .uc-mobile-menu -->
    </div>
    <!-- #main-wrapper -->
    @include('front.layout.bottomLinks')
</body>
</html>