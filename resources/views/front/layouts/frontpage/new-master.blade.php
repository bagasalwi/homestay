<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kontrakan Kontrakan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <link rel="manifest" href="site.webmanifest"> --}}
		{{-- <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('front2/img/favicon.ico')}}"> --}}

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ URL::asset('css/MyCSS.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/gijgo.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/slick.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/style.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/responsive.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('front2/css/all.min.css')}}">
            {{-- <link rel="stylesheet" href="{{ URL::asset('assets/modules/fontawesome/css/all.min.css')}}"> --}}
            {{-- <link rel="stylesheet" href="{{ URL::asset('assets/modules/fontawesome/css/all.min.css')}}"> --}}
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <strong>Loading</strong>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    @include('front.layouts.frontpage.new-navbar')
    <main>

        @yield('content')

    </main>
    @include('front.layouts.frontpage.new-footer')

    @yield('script')
   
	<!-- JS here -->
        {{-- <script src="https://kit.fontawesome.com/93d033efe6.js" crossorigin="anonymous"></script> --}}
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ URL::asset('front2/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/all.min.js')}}"></script>
		
        <!-- Jquery, Popper, Bootstrap -->
        <script src="{{ URL::asset('front2/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/popper.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ URL::asset('front2/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ URL::asset('front2/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{ URL::asset('front2/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ URL::asset('front2/js/wow.min.js')}}"></script>
		<script src="{{ URL::asset('front2/js/animated.headline.js')}}"></script>
        <script src="{{ URL::asset('front2/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ URL::asset('front2/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{ URL::asset('front2/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{ URL::asset('front2/js/contact.js')}}"></script>
        <script src="{{ URL::asset('front2/js/jquery.form.js')}}"></script>
        <script src="{{ URL::asset('front2/js/jquery.validate.min.js')}}"></script>
        <script src="{{ URL::asset('front2/js/mail-script.js')}}"></script>
        <script src="{{ URL::asset('front2/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ URL::asset('front2/js/plugins.js')}}"></script>
        <script src="{{ URL::asset('front2/js/main.js')}}"></script>
        <script src="{{ URL::asset('js/MyJS.js')}}"></script>
        
    </body>
</html>