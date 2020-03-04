<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close mt-3">
			<span class="icon-close2 js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap">
	<div class="site-navbar-top">
		<div class="container py-3">
			<div class="row align-items-center">
				<div class="col-6">
					<a href="#" class="p-2 pl-0"><span class="icon-twitter"></span></a>
					<a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
					<a href="#" class="p-2 pl-0"><span class="icon-linkedin"></span></a>
					<a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a>
				</div>
				<div class="col-6">
					<div class="d-flex ml-auto">
						<a href="#" class="d-flex align-items-center ml-auto mr-4">
							<span class="icon-envelope mr-2"></span>
							<span class="d-none d-md-inline-block">bagasalwisetyo2@gmail.com</span>
						</a>
						<a href="#" class="d-flex align-items-center">
							<span class="icon-phone mr-2"></span>
							<span class="d-none d-md-inline-block">0859-4660-xxxx</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="site-navbar site-navbar-target js-sticky-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-4">
					<h1 class="my-0 site-logo"><a href="{{ url('/') }}">Ngontrak Yuk</a></h1>
				</div>
				<div class="col-8">
					<nav class="site-navigation text-right" role="navigation">
						<div class="container">
							<div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
									class="site-menu-toggle js-menu-toggle text-white"><span
										class="icon-menu h3"></span></a></div>

							<ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
								<li>
									<a href="#home-section" class="nav-link">Home</a>
								</li>
								<li class="has-children">
									<a href="#about-section" class="nav-link">Tentang Kontrakan</a>
									<ul class="dropdown arrow-top">
										<li><a href="#our-team-section" class="nav-link">Team</a></li>
										<li><a href="#harga-section" class="nav-link">Harga</a></li>
										<li><a href="#faq-section" class="nav-link">Pertanyaan Seputar Kontrakan</a>
										</li>
										<li><a href="#fasilitas-section" class="nav-link">Fasilitas</a></li>
										<li><a href="#galeri-section" class="nav-link">Galeri</a></li>
									</ul>
								</li>
								<li>
									<a href="{{ url('/mydashboard') }}" class="nav-link" style="z-index: 1;">Transaction</a>
								</li>

								@guest
								<li><a href="{{ route('login') }}" class="nav-link">Masuk</a></li>
								<li><a href="{{ route('register') }}" class="nav-link">Daftar</a></li>
								@else
								@if (Auth::user()->hasRole('admin'))
								<li><a href="{{ route('home') }}" class="nav-link">Management</a></li>
								@endif

								<li class="has-children">
									<a href="#" class="nav-link">
										Hi, {{ strstr(Auth::user()->name, ' ', true) }}</a>
									<ul class="dropdown arrow-top">
										<li><a href="#" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();" class="nav-link">Logout</a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST"
											style="display: none;">
											@csrf
										</form>
									</ul>
								</li>
								<li class="has-children">
									&nbsp;
								</li>
								@endguest
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>