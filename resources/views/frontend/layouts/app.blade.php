<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Guruma - Online Course & Education HTML Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guruma - Online Course & Education HTML Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" href="{{ asset('frontend/css/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup/magnific-popup.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />

</head>

<body>

    <!--=================================
    Header -->
    @include('frontend.layouts.includes.navigation')
    <!--=================================
      Header -->
<br>
<br>
<br>

    <!--=================================
    Modal login -->
    @include('frontend.layouts.includes.login-modal')
    <!--=================================
    Modal login -->
    @yield('content')
    <!--=================================
          footer-->
    @include('frontend.layouts.includes.footer')
    <!--=================================
          footer-->

    <!--=================================
          Back To Top -->
    <div id="back-to-top" class="back-to-top">
        <a href="#"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!--=================================
          Back To Top -->

    <!--=================================
          Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{ asset('frontend/js/select2/select2.full.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiperanimation/SwiperAnimation.min.js') }}"></script>
    <script src="{{ asset('frontend/js/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

</body>

</html>
