{{-- ===================================================================================================================================================================== --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kreasi Bangsa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900">
    <link rel="stylesheet" href="{{ URL::asset('front/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('front/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('front/css/aos.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('front/css/style.css')}}">

    {{-- FONTS GOOGLE --}}
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Oswald&display=swap" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-dark" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="site-wrap">




        @include('front.layouts.navbar')

        @yield('content')

        @include('front.layouts.footer')
    </div>

    <script src="{{ URL::asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/jquery-ui.js')}}"></script>
    <script src="{{ URL::asset('front/js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/aos.js')}}"></script>
    <script src="{{ URL::asset('front/js/jquery.sticky.js')}}"></script>
    <script src="{{ URL::asset('front/js/jquery.easing.1.3.js')}}"></script>

    <script src="{{ URL::asset('front/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/main.js')}}"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/93d033efe6.js" crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>