@extends('front.layouts.frontpage.new-master')
@section('content')
<!-- slider Area Start-->
<div class="slider-area">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ URL::asset('front2/img/hero/contact_hero.jpg') }}">
        <div class="container">
            <div class="row ">
                <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                    <div class="hero-caption">
                        <span>{{ $title }}</span>
                        <h2>{{ $sub_title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- Fasilitas Start -->
<section class="room-area mt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <!--font-back-tittle  -->
                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Jenis Kamar</h3>
                    </div>
                    <h3 class="archivment-back">Jenis Kamar</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($jeniskamar as $jeniskamar)
            <div class="col-xl-4 d-flex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            <img src="{{ URL::asset('custom-images/jeniskamar/' . $jeniskamar->thumbnail)}}" alt="" style="width:280px; height:250px;">
                        </span>
                        <h3>{{ $jeniskamar->name }}</h3>
                        <div class="per-night">
                            <p>{{ $jeniskamar->description }}</p>
                            <a href="{{ url('jenis-kamar/' . $jeniskamar->id) }}" class="btn select-btn">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-- Room End -->

<!-- Fasilitas Start -->
{{-- <section class="room-area mt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <!--font-back-tittle  -->
                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Jenis Kamar</h3>
                    </div>
                    <h3 class="archivment-back">Jenis Kamar</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @foreach ($jeniskamar as $jeniskamar)
            <div class="col-4 d-plex text-center">
                <div class="single-room mb-50">
                    <div class="room-caption">
                        <span class="mb-100" style="font-size: 7em; color : green;">
                            <img src="{{ URL::asset('custom-images/jeniskamar/' . $jeniskamar->thumbnail)}}" alt="" style="width:250px; height:250px;">
                        </span>
                        <h3><a href="rooms.html">{{ $jeniskamar->name }}</a></h3>
                        <div class="per-night">
                            <p>{{ $jeniskamar->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section> --}}
<!-- Room End -->

@endsection