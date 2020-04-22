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
            @if ($kamar->count() == 0)
            <div class="col-12">
                <section class="sample-text-area text-center">
                    <img src="{{ URL::asset('custom-images/undraw/8.svg')}}" alt=""
                        style="width:400px; height:300px;">
                    <div class="container box_1170 mt-30">
                        <h3 class="text-heading">Kamar Tidak Tersedia</h3>
                        <p class="sample-text">
                            Maaf, Kamar untuk tipe ini sudah penuh atau tidak tersedia!
                        </p>
                        <a href="{{ url('jenis-kamar') }}" class="btn select-btn mt-20">Kembali</a>
                    </div>
                </section>
            </div>

            @else
            @foreach ($kamar as $kamar)
            <div class="col-xl-4 d-flex text-center">
                <div class="room-type mb-50">
                    <div class="room-caption">
                        <span style="font-size: 7em; color : green;">
                            {{-- <img src="{{ URL::asset('custom-images/jeniskamar/' . $kamar->thumbnail)}}" alt=""
                            style="width:280px; height:250px;"> --}}
                        </span>
                        <h3>{{ $kamar->name }}</h3>
                        <div class="per-night">
                            <p>{{ $kamar->description }}</p>
                            <a href="{{ url('jenis-kamar/detail/' . $kamar->id) }}" class="btn select-btn">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

</section>
<!-- Room End -->

@endsection