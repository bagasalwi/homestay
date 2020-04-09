@extends('front.layouts.master')

@section('content')

{{-- HOME OVERLAY --}}
{{-- <div class="site-blocks-cover overlay"
	style="background-image: url({{ URL::asset('front/myimages/kontrakan/4.jpeg')}});"
data-stellar-background-ratio="0.5" id="home-section">
<div class="container">
	<div class="row align-items-center text-center justify-content-center">
		<div class="col-md-10">
			<h1>Kontrakan & Homestay</h1>
			<span class="sub-text mb-3 d-block"><em>Kec. Serpong Utara, Kota Tangerang Selatan, Banten</em></span>
		</div>
	</div>
</div>
</div> --}}

<div class="container bg-primary">
	<div class="row">
		<div class="col-12"></div>
	</div>
</div>
{{-- <div class="jumbotron jumbotron-fluid bg-primary">
</div> --}}


{{-- BAR AFTER OVERLAY --}}
<div class="site-section border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div data-aos="fade-up" class="media custom-media">
					<div class="mr-3 icon">
						<i class="fas fa-map-marker-alt fa-3x"></i>
					</div>
					<div class="media-body">
						<h5 class="mt-0">Lokasi Strategis</h5>
						Lokasi kontrakan yang ada dimana-mana dan juga strategis.
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div data-aos="fade-up" class="media custom-media">
					<div class="mr-3 icon">
						<i class="fas fa-couch fa-3x"></i>
					</div>
					<div class="media-body">
						<h5 class="mt-0">Suasana Cozy</h5>
						Suasana kontrakan yang cozy bikin enjoy terus setiap hari.
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div data-aos="fade-up" class="media custom-media">
					<div class="mr-3 icon">
						<i class="fas fa-wallet fa-3x"></i>
					</div>
					<div class="media-body">
						<h5 class="mt-0">Terjangkau</h5>
						Harga yang bisa dibilang terjangkau bagi mahasiswa.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- ABOUT --}}
<div class="site-section about-section" id="about-section">
	<div class="container">
		<div class="row align-items-center mb-1 pb-5">
			<div data-aos="fade-right" class="col-lg-7 img-years mb-5 mb-lg-0">
				<img src="{{ URL::asset('front/myimages/undraw/1.svg')}}" alt="Image" class="img-fluid">
			</div>
			<div class="col-lg-4 ml-auto" data-aos="fade-left">
				<span class="sub-title">Kenapa sih BCreative Kontrakan?</span>
				<h3 class="mb-4">Tentang Kita</h3>
				<p class="mb-4">Dengan BCreative Kontrakan, dapat mempermudah kalian dalam memesan maupun mengorganisir
					kontrakan secara online</p>
				<ul class="list-unstyled ul-check text-left success mb-5">
					<li>Serba Online</li>
					<li>Mudah Pembayarannya</li>
					<li>Lokasi Strategis</li>
					<li>Tempat yang Cozy</li>
				</ul>
				<p><a href="#harga-section" class="btn btn-dark btn-lg rounded-0">Cek Harga</a></p>
			</div>
		</div>
	</div>
</div>

{{-- HARGA KONTRAKAN --}}
<div class="site-section" id="harga-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<span class="sub-title">Harga Kontrakan</span>
				<h2 class="font-weight-bold text-black">Pilihan Layanan BCreative Kontrakan</h2>
				<p class="mb-5">Kalian bisa pilih kontrakan berdasarkan fitur-fitur yang tersedia pada kontrakan</p>
			</div>
		</div>
		<div class="row">
			<div data-aos="fade-up" data-aos-anchor-placement="center-bottom"
				class="col-lg-4 col-md-6 mb-4 mb-lg-0 pricing">
				<div class="border p-5 text-center rounded">
					<h3>Non-AC</h3>
					<div class="price mb-3">
						<sup class="currency">Rp.</sup>
						<span class="number">500rb</span>
						<span class="per">/Bulan</span>
					</div>
					<p class="text-muted mb-4">* Pembayaran tanggal 25 tiap bulannya</p>
					<ul class="list-unstyled ul-check text-left success mb-5">
						<li>1 Bed</li>
						<li>Kamar Mandi</li>
						<li>Layanan Online</li>
						<li class="text-muted"><del>AC</del></li>
						<li class="text-muted"><del>Sofa</del></li>
					</ul>
					<p>
						<a href="#" class="btn btn-lg btn-dark rounded-0 btn-block">Pesan Sekarang</a>
					</p>
				</div>
			</div>

			<div data-aos="fade-up" data-aos-anchor-placement="center-bottom"
				class="col-lg-4 col-md-6 mb-4 mb-lg-0 pricing">
				<div class="border p-5 text-center rounded">
					<h3>AC</h3>
					<div class="price mb-3">
						<sup class="currency">Rp.</sup>
						<span class="number">1 jt</span>
						<span class="per">/Bulan</span>
					</div>
					<p class="text-muted mb-4">* Pembayaran tanggal 25 tiap bulannya</p>
					<ul class="list-unstyled ul-check text-left success mb-5">
						<li>1 Bed</li>
						<li>Kamar Mandi</li>
						<li>Layanan Online</li>
						<li>AC</li>
						<li class="text-muted"><del>Sofa</del></li>
					</ul>
					<p>
						<a href="#" class="btn btn-lg btn-dark rounded-0 btn-block">Pesan Sekarang</a>
					</p>
				</div>
			</div>

			<div data-aos="fade-up" data-aos-anchor-placement="center-bottom"
				class="col-lg-4 col-md-6 mb-4 mb-lg-0 pricing">
				<div class="border p-5 text-center rounded">
					<h3>Suites</h3>
					<div class="price mb-3">
						<sup class="currency">Rp.</sup>
						<span class="number">1.2 jt</span>
						<span class="per">/Bulan</span>
					</div>
					<p class="text-muted mb-4">* Pembayaran tanggal 25 tiap bulannya</p>
					<ul class="list-unstyled ul-check text-left success mb-5">
						<li>1 Bed</li>
						<li>Kamar Mandi</li>
						<li>Layanan Online</li>
						<li>AC</li>
						<li>Sofa</li>
					</ul>
					<p>
						<a href="#" class="btn btn-lg btn-dark rounded-0 btn-block">Pesan Sekarang</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- FAQ ABOUT --}}
<div class="site-section" id="faq-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mb-lg-0" data-aos="fade-right">
				<img src="{{ URL::asset('front/myimages/undraw/7.svg')}}" alt="Image" class="img-fluid">
			</div>
			<div class="col-lg-5 ml-auto pl-lg-5" data-aos="fade-left">
				<span class="sub-title">Pertanyaan Seputar Kontrakan</span>
				<h2 class="font-weight-bold text-black mb-5">F.A.Q</h2>
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="mb-0 rounded mb-2">
							<a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseOne"
								aria-expanded="false" aria-controls="collapseOne">
								Gimana Cara Pesennya?</a>
						</h2>
						<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
							data-parent="#accordionExample">
							<div class="accordion-body">
								<p>Sebelum kalian memesan kontrakan, pastikan kalian sudah menge-cek <a href="">Kamar
										Tersedia</a> pada
									masing-masing jenis kamar.</p>
								<p>Setelah kalian mengecek tersedianya kamar, kalian langsung bisa memesan kamar pada
									menu <a href="">Jenis Kamar</a>.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="mb-0 rounded mb-2">
							<a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
								aria-expanded="false" aria-controls="collapseTwo">
								Pembayaran nya gimana?
							</a>
						</h2>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
							data-parent="#accordionExample">
							<div class="accordion-body">
								<p>Saat ini kalian hanya bisa membayar bulanan kontrakan dengan transfer menggunakan
									foto sebagai bukti
									transfer.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="mb-0 rounded mb-2">
							<a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree"
								aria-expanded="false" aria-controls="collapseThree">
								Gimana kalo mau langsung dateng ke lokasi?
							</a>
						</h2>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
							data-parent="#accordionExample">
							<div class="accordion-body">
								<p>Kalian langsung bisa datang ke lokasi untuk survei, tapi untuk pemesanan kalian hanya
									bisa memesan
									via aplikasi web.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- FASILITAS KAMAR --}}
<div class="site-section" id="fasilitas-section">
	<div class="container">
		<div class="row justify-content-center" data-aos="fade-up">
			<div class="col-md-7 text-center">
				<span class="sub-title">fasilitas</span>
				<h2 class="font-weight-bold text-black">Fasilitas yang Kami Tawarkan</h2>
				<p class="mb-5">Fasilitas-fasilitas dibawah ini sudah ada pada setiap jenis kamar.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-interior-design display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Struktur yang Inovatif</h5>
						<p>tata ruang yang sangat strategis letaknya.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-step-ladder display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Kolam Renang</h5>
						Kolam Renang gratis bagi seluruh penghuni kontrakan.
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-turned-off display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Creative Design</h5>
						Tata ruang yang mempunyai desain kreatif
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-window display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Full Window</h5>
						Mempunyai jendela yang banyak di setiap hunian.
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-measuring display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Bangunan yang Kokoh</h5>
						Bangunan yang dibuat dengan anti gempa dan banjir.
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
				<div class="media custom-media">
					<div class="mr-3 icon"><span class="flaticon-sit-down display-4"></span></div>
					<div class="media-body">
						<h5 class="mt-0">Interior Bonus</h5>
						Memiliki bonus perlengkapan barang-barang bagi suites room
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- 3 JENIS KAMAR --}}
<div class="site-section" id="news-section">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<span class="sub-title">Detail Kamar</span>
				<h2 class="font-weight-bold text-black mb-5">Jenis Kamar yang Tersedia</h2>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 post-entry" data-aos="zoom-in">
				<a href="#" class="d-block figure">
					<img src="{{ URL::asset('front/images/img_1.jpg')}}" alt="Image" class="img-fluid">
				</a>
				<span class="text-muted d-block mb-1">29, January 2019</span>
				<div class="row">
					<div class="col-sm-6">
						<h3><a href="#">Kamar Non-AC</a></h3>
					</div>
					<div class="col-sm-6 text-right">
						<p><a href="#" class="btn btn-dark btn-sm rounded-0">Lihat Kamar</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 post-entry" data-aos="zoom-in">
				<a href="#" class="d-block figure">
					<img src="{{ URL::asset('front/images/img_2.jpg')}}" alt="Image" class="img-fluid">
				</a>
				<span class="text-muted d-block mb-1">29, January 2019</span>
				<div class="row">
					<div class="col-sm-6">
						<h3><a href="#">Kamar AC</a></h3>
					</div>
					<div class="col-sm-6 text-right">
						<p><a href="#" class="btn btn-dark btn-sm rounded-0">Lihat Kamar</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 post-entry" data-aos="zoom-in">
				<a href="#" class="d-block figure">
					<img src="{{ URL::asset('front/images/img_3.jpg')}}" alt="Image" class="img-fluid">
				</a>
				<span class="text-muted d-block mb-1">29, January 2019</span>
				<div class="row">
					<div class="col-sm-6">
						<h3><a href="#">Kamar Suite</a></h3>
					</div>
					<div class="col-sm-6 text-right">
						<p><a href="#" class="btn btn-dark btn-sm rounded-0">Lihat Kamar</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- GALERI KONTRAKAN --}}
<div class="site-section" id="galeri-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<span class="sub-title">Galeri</span>
				<h2 class="font-weight-bold text-black">Galeri Kontrakan</h2>
				<p class="mb-5">Koleksi galeri foto dari kontrakan kami</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_1.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/1.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Butterfly House</a></h3>
				<span class="text-muted">Interior</span>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_2.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/2.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Interior Bed Design</a></h3>
				<span class="text-muted">Design</span>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_3.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/3.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Kitchen Sink Design</a></h3>
				<span class="text-muted">Interior</span>
			</div>

			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_4.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/5.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Lobby Interior Design</a></h3>
				<span class="text-muted">Interior</span>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_5.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/6.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Relaxation Room Design</a></h3>
				<span class="text-muted">Design</span>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 project-entry" data-aos="zoom-in-up">
				<a href="images/img_6.jpg')}}" class="d-block figure" data-fancybox="gallery">
					<img src="{{ URL::asset('front/myimages/kontrakan/8.jpeg')}}" alt="Image" class="img-fluid">
				</a>
				<h3 class="mb-0"><a href="#">Butterfly House</a></h3>
				<span class="text-muted">Interior</span>
			</div>
		</div>
	</div>
</div>

@endsection