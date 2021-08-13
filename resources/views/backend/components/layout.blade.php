<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jan 2021 15:49:21 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kobir LMS || @yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('theme/backend/assets/images/favicon-32x32.png')}}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{asset('theme/backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('theme/backend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('theme/backend/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/bootstrap.min.css')}}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/icons.css')}}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/dark-sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/backend/assets/css/dark-theme.css')}}" />
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    @include('backend.components.header');
    @include('backend.components.sidebar');
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
@include('backend.components.footer');
</div>
<!-- end wrapper -->
<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('theme/backend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/js/bootstrap.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('theme/backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
<script src="{{asset('theme/backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('theme/backend/assets/js/index.js')}}"></script>
<!-- App JS -->
@yield('script')
<script src="{{asset('theme/backend/assets/js/handlebars.js')}}"></script>
@yield('page-script')
<script src="{{asset('theme/backend/assets/js/app.js')}}"></script>
<script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script>
</body>


</html>
