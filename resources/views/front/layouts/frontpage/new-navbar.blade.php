<header>
    <!-- Header Start -->
    <div class="header-area header-sticky">
        <div class="main-header ">
            <div class="container">
                <div class="row align-items-center">
                    <!-- logo -->
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            Kontrakan
                        </div>
                    </div>
                    @guest
                    <div class="col-xl-6 col-lg-6">
                    @else
                    <div class="col-xl-8 col-lg-8">
                    @endguest
                        <!-- main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('tentang-kamar') }}">Tentang</a></li>
                                    <li><a href="{{ url('jenis-kamar') }}">Jenis Kamar</a></li>
                                    <li><a href="{{ url('lokasi') }}">Lokasi</a></li>
                                    @guest
                                    <li><a href="#">My Account</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('login') }}">Login</a>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="#">Hi, {{ strstr(Auth::user()->name, ' ', true) }}</a>
                                        <ul class="submenu">
                                            <li><a target="_blank" href="{{ url('myprofile') }}">Profile</a>
                                            <li><a target="_blank" href="{{ url('mydashboard') }}">Transaction</a></li>
                                            @if (Auth::user()->hasRole('admin'))
                                            <li><a target="_blank" href="{{ route('home') }}">Management</a></li>
                                            @endif
                                            <li><a href="#" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
											style="display: none;">
											@csrf
										    </form>

                                        </ul>
                                    </li>
                                    

                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @guest
                    <div class="col-xl-2 col-lg-2">
                        <div class="header-btn">
                            <a href="{{ route('register') }}" class="genric-btn primary-border radius d-none d-lg-block">Daftar</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="header-btn">
                            <a href="{{ route('login') }}" class="genric-btn primary radius d-none d-lg-block">Masuk</a>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-2 col-lg-2">
                        <!-- header-btn -->
                        @if (Auth::user()->hasRole('admin'))
                            {{-- <li><a target="_blank" href="{{ route('home') }}">Management</a></li> --}}
                            <div class="header-btn">
                                <a target="_blank" href="{{ route('home') }}" class="btn btn1 d-none d-lg-block ">Management</a>
                            </div>
                        @else
                        <div class="header-btn">
                            <a href="{{ url('jenis-kamar') }}" class="btn btn1 d-none d-lg-block ">Pesan Sekarang</a>
                        </div>
                        @endif
                    </div>
                    @endguest
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>