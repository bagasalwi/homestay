@extends('front.layouts.frontpage.new-master')
@section('content')
@foreach ($kamar as $kamar)

@php
// dd($kamar);
@endphp
<!-- slider Area Start-->
<div class="slider-area">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ URL::asset('front2/img/hero/contact_hero.jpg') }}">
        <div class="container">
            <div class="row ">
                <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                    <div class="hero-caption">
                        <span>Detail Kamar</span>
                        <h2>{{ $kamar->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- Gallery img Start-->
<div class="gallery-area fix">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="gallery-active owl-carousel">
                    @foreach ($kamar_detail as $detail)
                    <div class="gallery-img">
                        <a href="#"><img src="{{ URL::asset('custom-images/kamar_detail/' . $detail->image) }}" alt=""
                                style="width:800px;height:400px;"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery img End-->


<!--================Blog Area =================-->
<section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h1>{{ $kamar->name }}</h1>
                        <hr>
                        <h4 class="mt-20">Deskripsi</h4>
                        <p class="excert">
                            {{ $kamar->description }}
                        </p>
                        <div class="quote-wrapper">
                            <div class="quotes text-center">
                                Sebelum kamu memilih untuk pesan kamar ini Baca Ketentuan dulu ya!
                            </div>
                        </div>
                        <div class="text-center mb-40">


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-12 mt-20 mb-20">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Harga</h4>
                                        <strong>Rp. {{ number_format($kamar->harga) }}</strong> / Bulan
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            @if($kamar->user_id)
                                            <button class="genric-btn disable text-dark">Kamar Kosong / Di pesan</button>
                                            @else
                                            <button type="button" class="genric-btn primary" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                Pesan Kamar Ini
                                            </button>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-10">
                        <h4 class="text-secondary">Fasilitas Umum</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-wifi"></i></span>
                            <div class="media-body">
                                <h3>Wifi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-tree"></i></span>
                            <div class="media-body">
                                <h3>Taman</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-utensils"></i></span>
                            <div class="media-body">
                                <h3>Dapur</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                    </div>
                    <div class="col-sm-12 mb-10">
                        <h4 class="text-secondary">Fasilitas Kamar</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-fan"></i></span>
                            <div class="media-body">
                                <h3>Tipe Kamar</h3>
                                <p>{{ $kamar->jeniskamar }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-bath"></i></span>
                            <div class="media-body">
                                <h3>Kamar Mandi</h3>
                                <p>{{ $kamar->kamar_mandi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-plug"></i></span>
                            <div class="media-body">
                                <h3>Jenis Listrik</h3>
                                <p>{{ $kamar->listrik }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-lg fa-map-marked-alt"></i></span>
                            <div class="media-body">
                                <h3>Lokasi Detail</h3>
                                <p> <strong>{{ $kamar->locationname }}, </strong> {{ $kamar->locationdesc }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endforeach

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Syarat & Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/pesankamar') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">
                <input type="hidden" name="jeniskamar_id" value="{{ $kamar->jeniskamar_id }}">
                <input type="hidden" name="location_id" value="{{ $kamar->location_id }}">

                <div class="modal-body">
                    <span>Sebelum kamu melanjutkan untuk memesan kamu harus baca <strong>Syarat & Ketentuan</strong>
                        dibawah
                        ini :</span>
                    <br>
                    <br>
                    <ol class="ordered-list">
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                        <li>Pengontrak harus mendaftar sesuai dengan nama dari pengontrak pada website sebelum memesan
                        </li>
                        <li>pengontrak tidak boleh membawa orang lain seijin dengan ibu kost</li>
                        <li>pembayaran akan di tagih melalui email pada tanggal 25</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <input type="checkbox" class="float-left"
                        onchange="document.getElementById('test1').disabled = !this.checked;" /> Saya setuju dengan
                    semua persyaratan diatas.
                    <br>
                    <button type="button" class="genric-btn danger radius" data-dismiss="modal">Close</button>
                    <button type="submit" class="genric-btn primary radius" id="test1" disabled
                        target="_blank">Pesan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    swal("Hello world!");
</script>
@endsection