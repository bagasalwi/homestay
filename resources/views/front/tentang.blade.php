@extends('front.layouts.frontpage.new-master')
@section('content')
<!-- slider Area Start-->
<div class="slider-area">
	<div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ URL::asset('front2/img/hero/contact_hero.jpg') }}" >
		<div class="container">
			<div class="row ">
				<div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
					<div class="hero-caption">
						<span>Kontrakan</span>
						<h2>Tentang</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- slider Area End-->

<!-- TENTANG -->
<section class="make-customer-area mt-120 fix">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="customer-img mb-120">
                    <!-- <img src="assets/img/customer/customar1.png" class="customar-img1" alt=""> -->
                    <img src="{{ URL::asset('custom-images/kontrakan/h12.jpg')}}" class="customar-img1" alt="">
                    <div class="service-experience">
                        <h3>Terjangkau</h3>
                    </div>
                </div>
            </div>
            <div class=" col-xl-4 col-lg-4">
                <div class="customer-caption">
                    <span>Tentang Kita</span>
                    <h2>Pesan Kontrakan atau Homestay dimana saja</h2>
                    <div class="caption-details">
                        <p>Dengan Kontrakan Kontrakan, dapat mempermudah kalian dalam memesan maupun mengorganisir
                            kontrakan secara online</p>
                        <p></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tentang End-->

<!-- Lokasi Start-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <!--font-back-tittle  -->
                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Lokasi Kontrakan</h3>
                    </div>
                    <h3 class="archivment-back">Lokasi</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @foreach ($location as $location)
            <div class="col-lg-4 text-center">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{ url('lokasi/' . $location->name) }}">
                                <h2>{{ $location->name }}</h2>
                            </a>
                            <p>{{ $location->description }}</p>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Lokasi End-->

<!-- Fasilitas Start -->
<section class="room-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <!--font-back-tittle  -->
                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Fasilitas</h3>
                    </div>
                    <h3 class="archivment-back">Facilities</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 d-flex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            <i class="fas fa-tree"></i>
                        </span>
                        <h3>Taman</h3>
                        <div class="per-night">
                            <p>Mempunyai taman di tengah yang menyejukan area kontrakan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-flex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            <i class="fas fa-wifi"></i>
                        </span>
                        <h3>Wifi</h3>
                        <div class="per-night">
                            <p>Suasana kontrakan yang cozy bikin enjoy terus setiap hari.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-flex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <h3>Lokasi Strategis</h3>
                        <div class="per-night">
                            <p>Lokasi kontrakan yang ada dimana-mana dan juga strategis.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-flex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            <i class="fas fa-money-bill-wave-alt"></i>
                        </span>
                        <h3>Terjangkau</h3>
                        <div class="per-night">
                            <p>Harga yang bisa dibilang terjangkau bagi mahasiswa.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- Room End -->

<!-- Dining Start -->
<div class="dining-area dining-padding-top">
    <!-- Single Left img -->
    <div class="single-dining-area left-img">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-8">
                    <div class="dining-caption">
                        <span>Kamar Mandi</span>
                        <h3>Kamar Mandi Dalam & Luar</h3>
                        <p>Pada kontrakan Kontrakan akan diberi 2 pilihan yaitu kamar mandi dalam atau luar. Untuk kamar mandi luar ada 2 kamar mandi yang selalu di bersihkan setiap hari.</p>
                        {{-- <a href="#" class="btn border-btn">Kamar Mandi <i class="ti-angle-right"></i> </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single Right img -->
    <div class="single-dining-area right-img">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-8 col-md-8">
                    <div class="dining-caption text-right">
                        <span>Dapur</span>
                        <h3>Dapur Umum</h3>
                        <p>Terdapat dapur umum untuk para penghuni kontrakan yang menyediakan ricecooker, peralatan makan dan juga wastafel.</p>
                        {{-- <i href="#" class="btn border-btn">Gambar Dapur <i class="ti-angle-right"></i></i> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dining End -->

<!-- Gallery Start -->
<section class="room-area mt-100 mb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <!--font-back-tittle  -->
                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Gallery</h3>
                    </div>
                    <h3 class="archivment-back">Gallery</h3>
                </div>
            </div>
        </div>
        <div class="row gallery-item">
            @foreach ($location_detail as $detail)

            <div class="col-md-4">
                <a href="{{ URL::asset('custom-images/location/' . $detail->image) }}" class="img-pop-up">
                    <div class="single-gallery-image"
                        style="background: url({{ URL::asset('custom-images/location/' . $detail->image) }});"></div>
                </a>
            </div>
            @endforeach

        </div>
    </div>

</section>
<!-- Gallery End -->

@endsection